<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Rawilk\Printing\Facades\Printing;

class PrintLabelController extends Controller
{
    //
    public function index(Request $request){
        if ($request->input("API_KEY") != env("MAIL_WEBHOOK_SECRET"))
            return abort(401);

        $validator = Validator::make($request->all(),[
            "sku" => [
                "required"
            ]
        ]);

        if($validator->fails())
            return response()->json($validator->errors(),404);

        $skus = explode("|",$request->input("sku"));

        foreach ($skus as $s){
            $entry = explode(" x ",$s);
            $amount = $entry[0];
            $sku = $entry[1];

            if (Config::has("sku_printer_mappings.$sku"))
                for ($i=0; $i < Config::get("sku_printer_mappings.$sku.amount")*$amount; $i++) {
                    $printJob = Printing::newPrintTask()
                        ->printer(69963355)
                        ->file('labels/' . Config::get("sku_printer_mappings.$sku.label"))
                        ->send();

                }
        }

        return response()->json(['message'=>'success']);
    }

    public function shelter_label(Request $request){
        if ($request->input("API_KEY") != env("MAIL_WEBHOOK_SECRET"))
            return abort(401);

        $printJob = Printing::newPrintTask()
            ->printer(69963355)
            ->file('labels/shelter.pdf')
            ->send();

        return response()->json(['message'=>'success']);
    }
}
