<?php

namespace App\Http\Controllers;

use App\Mail\OrderDeliveredToShelter;
use App\Mail\OrderInvoice;
use App\Mail\OrderReadyToShip;
use App\Mail\PostOrderDiscount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OrderMailController extends Controller
{
    public function process(Request $request)
    {
        if ($request->input('API_KEY') != env('MAIL_WEBHOOK_SECRET')) {
            return abort(401);
        }
        $validator = Validator::make($request->all(), [
            'mail_type' => [Rule::in(['discount', 'order_delivered_to_shelter', 'invoice', 'ready_to_ship'])],
            'order_num' => [
                'required', 'numeric',
            ],
            'c_name' => [
                'nullable',
            ],
            'c_mail' => [
                'required',
                'email',
            ],
            'sh_name' => [
                'required',
            ],
            'invoice_link' => [
                'required_if:mail_type,invoice',
            ],
            'order_link' => [
                'required_if:mail_type,discount',
            ],

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }

        $c_mail = $request->input('c_mail');
        $c_name = $request->input('c_name');
        if ($c_name == null) {
            $c_name = '';
        } else {
            $c_name = explode(' ', $c_name)[0];
        }

        $sh_name = $request->input('sh_name');
        $order_num = $request->input('order_num');

        switch ($request->input('mail_type')) {
            case 'invoice':
                $invoice_link = $request->input('invoice_link');
                Mail::to($c_mail)->send(new OrderInvoice($order_num, $sh_name, $c_name, $invoice_link));

                return response()->json('sent '.$request->input('mail_type'));
            case 'discount':
                $order_link = $request->input('order_link');
                $output = shell_exec("python3 discount.py $c_mail $order_num 2>&1");
                $json = json_decode($output);
                $discount = $json[0];
                $valid_to = $json[1];
                Mail::to($c_mail)->send(new PostOrderDiscount($order_num, $sh_name, $c_name, $discount, $valid_to, $order_link));

                return response()->json('sent '.$request->input('mail_type'));
            case 'order_delivered_to_shelter':
                Mail::to($c_mail)->send(new OrderDeliveredToShelter($order_num, $sh_name, $c_name));

                return response()->json('sent '.$request->input('mail_type'));
                break;
            case 'ready_to_ship':
                Mail::to($c_mail)->send(new OrderReadyToShip($order_num, $sh_name, $c_name));

                return response()->json('sent '.$request->input('mail_type'));
        }
    }
}
