<?php

namespace App\Http\Livewire\File;

use App\Models\Fee;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Shipment;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public $filetype;

    public $file;

    public $content;

    public $showGasRate;
    public $gasRate;

    protected $rules = [
        'filetype' => ['required', 'in:baselinker,allegro,amazon,dpd,inpost'],
        'file' => ['required', 'mimes:csv,txt', 'max:10240'],
    ];

    public function selectChange(){
        $this->content = "";
        if($this->filetype == "aa") {
            $this->showGasRate = true;
            $this->rules = [
                'filetype' => ['required', 'in:baselinker,allegro,amazon,dpd,inpost'],
                'file' => ['required', 'mimes:csv,txt', 'max:10240'],
                'gasRate' => ['required', 'min:1','min:2','numeric']
            ];
        }else {
            $this->showGasRate = false;
            $this->rules = [
                'filetype' => ['required', 'in:baselinker,allegro,amazon,dpd,inpost'],
                'file' => ['required', 'mimes:csv,txt', 'max:10240'],
            ];
        }
        return true;
    }

    public function render()
    {
        return view('livewire.file.upload');
    }

    public function submit()
    {
        $this->validate();
        $this->file->storeAs('reports', "$this->filetype.csv");

        $this->processFile();

        session()->flash('message', "Raport $this->filetype został pomyślnie wgrany.");
        //return redirect()->route('account.upload-file');
        return true;
    }

    private function processFile()
    {
        $this->content = "";
        switch ($this->filetype) {
            case 'baselinker':
                return $this->processBaseLinkerFile();
            case 'dpd':
                return $this->processDPDFile();
            case 'inpost':
                return $this->processInPostFile();
            case 'amazon':
                break;
            case 'allegro':
                return $this->processAllegroFile();
        }
    }

    private function processBaseLinkerFile()
    {
        $row = 1;
        $log = '';
        $log .= "Dziennik zdarzeń:\n";
        if (($handle = fopen(storage_path()."/app/reports/$this->filetype.csv", 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $num = count($data);
                $row++;
                $order_id = $data[0];
                $external_order_id = $data[1];
                $source = $data[2];
                $date = $data[3];
                $country_code = $data[4];
                $postal_code = $data[5];
                $smart = $data[6];
                $delivery_price = round(floatval($data[7]),2);;
                $cod = $data[8];
                $currency = $data[9];

                $order = Order::create($order_id, $external_order_id, $source, $date, $country_code, $postal_code, $smart, $delivery_price, $cod, $currency);

                if (!$order) {
                    $order = Order::find($order_id);
                }


                $product_records = explode(';', $data[10]);

                $arr = [];
                $error = false;

                for ($c = 0; $c < count($product_records) - 1; $c++) {
                    $product = explode('|', $product_records[$c]);
                    $sku = $product[0];
                    $gross_price = $product[1];
                    $qty = $product[2];
                    try {
                        $p = Product::findOrFail($sku);
                        array_push($arr,[$order, $p, $gross_price, $qty]);
                    }catch (\Exception $exception){
                        $log .= "SKU $sku nie zostało znalezione (Zamówienie $order_id).\n";
                        $error = true;
                        break;
                    }

                }
                if($error) {
                    Order::find($order_id)->delete();
                    continue;
                }

                foreach ($arr as $a){
                    $op = OrderProduct::addProduct($a[0], $a[1], $a[2], $a[3]);
                }
            }
            fclose($handle);
        }
        $this->content = $log;

        return true;
    }

    private function processAllegroFile()
    {
        set_time_limit(0);
        $row = 0;
        $log = '';
        if (($handle = fopen(storage_path()."/app/reports/$this->filetype.csv", 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, ';')) !== false) {

                $num = count($data);
                $row++;
                $type = $data[3];
                $is_charge = true;
                $fee = -round(floatval(str_replace(",",".",$data[5])),2);
                if(empty($fee)) {
                    $fee = round(floatval(str_replace(",",".",$data[4])),2);
                    $is_charge = false;
                }
                $balance = $data[6];

                $net_fee = $fee/1.23;

                $pattern = '/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}/';

                preg_match($pattern, $data[7], $external_order_id);

                try {
                    $external_order_id = $external_order_id[0];
                }catch (\Exception $exception){
                    $log .= "Wiersz $row nie zawiera numeru zanmówienia\n";
                    continue;
                }

                $id = sha1($data[0]."".$balance."".$type);

                $o = Order::findByOrderID($external_order_id);
                if($o == null) {
                    $log .= "Brak zamówienia o zewnętrznym numerze zamówienia $external_order_id\n";
                    continue;
                }

                if(Fee::find($id)==null) {
                    $fee = new Fee();
                    $fee->id = $id;
                    $fee->type = $type;
                    $fee->is_charge = $is_charge;
                    $fee->net_price = $net_fee;
                    $fee->order_id = $o->order_id;

                    $fee->order()->associate($o);
                    $fee->save();
                }

            }
            fclose($handle);
        }
        $this->content = $log;

        return true;
    }

    private function processInPostFile()
    {
        set_time_limit(0);
        $row = 0;
        $log = '';
        $log .= "Dziennik zdarzeń:\n";
        if (($handle = fopen(storage_path()."/app/reports/$this->filetype.csv", 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, ';')) !== false) {
                $row++;
                if($row == 1)
                    continue;
                $order_id = $data[13];
                $tracking_number = $data[3];
                $net_price = round(floatval($data[7]),2);
                if (str_contains(strtolower($data[9]),"paczkomat"))
                    $type = "paczkomat";
                else
                    $type = "inpost";
                $weight = round(floatval($data[11]),2);
                $package_amount = (int) $data[14];

                if(empty($order_id)) {
                    $log .= "Wiersz $row nie zawiera numeru zanmówienia\n";
                    continue;
                }

                $pattern = '/\b\d{8}\b/';
                preg_match($pattern, $order_id, $o_id);

                if(empty($o_id[0]))
                    continue;
                $order_id = $o_id[0];

                $o = Order::find($order_id);
                if($o == null) {
                    $log .= "Brak zamówienia o podanym numerze - $order_id\n";
                    continue;
                }

                $shipment = new Shipment();
                $shipment->order_id = $order_id;
                $shipment->tracking_number = $tracking_number;
                $shipment->weight = $weight;
                $shipment->net_price = $net_price;
                $shipment->type = $type;
                $shipment->package_amount = $package_amount;
                $shipment->save();




            }
            fclose($handle);
        }
        $this->content = $log;

        return true;
    }

    private function processDPDFile()
    {
        set_time_limit(0);
        $row = 0;
        $log = '';
        $log .= "Dziennik zdarzeń:\n";
        if (($handle = fopen(storage_path()."/app/reports/$this->filetype.csv", 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, ',')) !== false) {
                $row++;
                if($row == 1)
                    continue;
                $order_id = $data[12];
                $tracking_number = $data[10];
                $net_price = round(floatval($data[13]),2);
                $type = explode(' | ',$data[17])[0];
                $weight = round(floatval($data[18]),2);
                $package_amount = (int) $data[19];
                if(empty($order_id)){
                    $shipment = Shipment::where('tracking_number',$tracking_number)->first();
                    if($shipment != null){

                        $id = sha1($data[0]."".$data[8]."".$tracking_number);
                        $fee = new Fee();
                        $fee->id = $id;
                        $fee->type = $type;
                        $fee->is_charge = true;
                        $fee->net_price = $net_price;
                        $fee->order_id = $shipment->order_id;
                        $fee->save();

                        continue;

                    }else continue;

                }
                $pattern = '/\b\d{8}\b/';
                preg_match($pattern, $data[12], $o_id);

                if(empty($o_id[0])) {
                    $log .= "Wiersz $row nie zawiera numeru zanmówienia\n";
                    continue;
                }
                $order_id = $o_id[0];



                $o = Order::find($order_id);
                if($o == null) {
                    $log .= "Brak zamówienia o podanym numerze - $order_id\n";
                    continue;
                }


                $shipment = new Shipment();
                $shipment->order_id = $order_id;
                $shipment->tracking_number = $tracking_number;
                $shipment->weight = $weight;
                $shipment->net_price = $net_price;
                $shipment->type = "dpd";
                $shipment->package_amount = $package_amount;
                $shipment->save();


            }
            fclose($handle);
        }
        $this->content = $log;

        return true;
    }
}
