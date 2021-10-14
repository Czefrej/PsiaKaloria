<?php

namespace App\Listeners;

use App\Mail\OrderShipped;
use App\Models\Package;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class SyncPackageStatus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $package = $event->package;
        $order = $package->order;
        $status = null;
        switch ($package->status){
            case "shipped":
                //Mail::to($package->order->user)->send(new OrderShipped($package));
                $status = "sent";
                break;
            case "return":
                $status = "returned";
                break;
            case "delivered":
                $status = "delivered";
                break;
            case "in_pickup_point":
                $status = "in_pickup_point";
                break;
            case "on_the_way":
                $status = "on_the_way";
                break;
            case "out_for_delivery":
                $status = "sent";
                break;
        }

        if($status != null && $package->allPackagesHasTheSameStatus()) {
            App::call("App\Http\Controllers\BaselinkerController@setOrderStatus", ["order" => $order, "status" => $status]);
            $order->status = $status;
            $order->save();
        }
    }
}
