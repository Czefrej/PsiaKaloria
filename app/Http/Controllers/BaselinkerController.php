<?php

namespace App\Http\Controllers;

use App\Interfaces\BaselinkerRepositoryInterface;
use App\Models\DeliveryMethod;
use App\Models\DeliveryPaymentAvailability;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\SavedAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PragmaRX\Countries\Package\Countries;


class BaselinkerController extends Controller
{
    private $example;
    public function __construct(BaselinkerRepositoryInterface $home) {
        $this->example = $home;
    }
    public function link($bl_order_id, $secret) {
        if($secret != env("BL_SYNC_SECRET"))
            return response()->json(["status"=>"error","message"=>"BL_SYNC_SECRET is invalid"]);

        $bl_order = $this->example->getquery("getOrders",["order_id"=>$bl_order_id]);

        if(empty($bl_order->orders))
            return response()->json(["status"=>"error","message"=>"Baselinker ID is invalid."]);

        $bl_order = $bl_order->orders[0];
        $total_price = 0;
        $products = [];
        $i = 0;
        foreach ($bl_order->products as $p){
            $total_price += $p->quantity*$p->price_brutto;
            $products[$i]['product'] = Product::find($p->sku);
            $products[$i]['quantity'] = $p->quantity;
            $products[$i]['unit_price'] = $p->price_brutto;
            $i++;
        }

        $bl_order_due = abs($bl_order->payment_done - $total_price - $bl_order->delivery_price);

        if(($user = User::existsWithID($bl_order->email)) === false){
            $user = User::createTemporary($bl_order->user_login,$bl_order->email);
        }
        if(($savedAddress = SavedAddress::exists($user, (bool) $bl_order->want_invoice, $bl_order->invoice_fullname, $bl_order->invoice_company,$bl_order->invoice_nip, $bl_order->invoice_address, $bl_order->invoice_postcode, $bl_order->invoice_city, $bl_order->invoice_country_code,
            $bl_order->delivery_fullname,$bl_order->phone,$bl_order->delivery_company,$bl_order->delivery_address,$bl_order->delivery_postcode,$bl_order->delivery_city,$bl_order->delivery_country_code,
            $bl_order->delivery_point_id, $bl_order->delivery_point_name, $bl_order->delivery_point_address, $bl_order->delivery_point_postcode, $bl_order->delivery_point_city)) === false){

            $savedAddress = SavedAddress::create($user, (bool)$bl_order->want_invoice, $bl_order->invoice_fullname, $bl_order->invoice_company, $bl_order->invoice_nip, $bl_order->invoice_address, $bl_order->invoice_postcode, $bl_order->invoice_city, $bl_order->invoice_country_code,
                $bl_order->delivery_fullname, $bl_order->phone, $bl_order->delivery_company, $bl_order->delivery_address, $bl_order->delivery_postcode, $bl_order->delivery_city, $bl_order->delivery_country_code,
                $bl_order->delivery_point_id, $bl_order->delivery_point_name, $bl_order->delivery_point_address, $bl_order->delivery_point_postcode, $bl_order->delivery_point_city
            );
        }

        $payment_method = PaymentMethod::methodExists($bl_order->payment_method,$bl_order->invoice_country_code);
        $delivery_method = DeliveryMethod::methodExists($bl_order->delivery_method,$bl_order->invoice_country_code);
        $dp_availability = DeliveryPaymentAvailability::isAvailable($payment_method,$delivery_method);

        if(Order::existsWithID($bl_order->order_id) === false){

            $order = Order::create($bl_order->order_id,$user,$savedAddress,$dp_availability,Config::get("mappings.baselinker.status.$bl_order->order_status_id.system_status")?: "unknown",0,$bl_order->order_page,$bl_order_due,$bl_order->payment_done,Config::get("mappings.baselinker.source.$bl_order->order_source_id")?: "personal");

            OrderItem::deleteAllProducts($order);
            foreach ($products as $p){
                OrderItem::addProduct($order,$p['product'],$p['unit_price'],$p['quantity']);
            }

        }else{
            $order = Order::updateWithID($bl_order->order_id,$user,$savedAddress,$dp_availability,Config::get("mappings.baselinker.status.$bl_order->order_status_id.system_status")?: "unknown",0,$bl_order->order_page,$bl_order_due,$bl_order->payment_done,Config::get("mappings.baselinker.source.$bl_order->order_source_id")?: "personal");
        }

        $packages = $this->getPackages($bl_order_id)->packages;

        foreach ($packages as $package){
            if(Package::exists($order,$package->courier_package_nr) === false)
                $p = Package::add($order,$package->courier_package_nr,$package->courier_code);
        }

        return response()->json([
            'status'=>'SUCCESS'
        ]);
    }

    private function getPackages($bl_order_id){
        $packages = $this->example->getquery("getOrderPackages",["order_id"=>$bl_order_id]);
        return $packages;
    }

    public function setOrderStatus(Order $order,string $status){
        $status = Config::get("mappings.baselinker.status_reversed.$status")?: "unknown";
        if($status == "unknown")
            return response()->json([
                'status'=>'ERROR',
                'message'=>'Unknown status id'
            ]);
        $this->example->getquery("setOrderStatus",["order_id"=>$order->id,"status_id"=>$status]);

        return response()->json([
            'status'=>'SUCCESS'
        ]);
    }

}
