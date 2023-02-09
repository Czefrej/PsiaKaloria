<?php

namespace App\Http\Livewire\File;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public $filetype;

    public $file;

    public $content;

    protected $rules = [
        'filetype' => ['required', 'in:baselinker,allegro,amazon,dpd,inpost'],
        'file' => ['required', 'mimes:csv,txt', 'max:10240'],
    ];

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
        switch ($this->filetype) {
            case 'baselinker':
                return $this->processBaseLinkerFile();
                break;
            case 'dpd':
                break;
            case 'inpost':
                break;
            case 'amazon':
                break;
            case 'allegro':
                break;
        }
    }

    private function processBaseLinkerFile()
    {
        $row = 1;
        $content = '';
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
                $delivery_price = $data[7];
                $cod = $data[8];
                $currency = $data[9];

                $order = Order::create($order_id, $external_order_id, $source, $date, $country_code, $postal_code, $smart, $delivery_price, $cod, $currency);

                if ($order) {
                    $content .= "$order->order_id";
                } else {
                    $order = Order::find($order_id);
                }

                $product_records = explode(';', $data[10]);

                for ($c = 0; $c < count($product_records) - 1; $c++) {
                    $product = explode('|', $product_records[$c]);
                    $sku = $product[0];
                    $gross_price = $product[1];
                    $qty = $product[2];
                    $p = Product::findOrFail($sku);
                    $op = OrderProduct::addProduct($order, $p, $gross_price, $qty);
                    $this->content .= " $sku,$gross_price,$qty \n";
                }
            }
            fclose($handle);
        }

        return true;
    }
}
