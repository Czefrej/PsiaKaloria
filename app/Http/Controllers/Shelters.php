<?php

namespace App\Http\Controllers;

use App\Models\AnimalShelter;
use Illuminate\Http\Request;

class Shelters extends Controller
{
    //

    public function index(Request $request)
    {
        $shelters = AnimalShelter::all();
        $arr = [];
        foreach ($shelters as $shelter){
            array_push($arr,[$shelter->name,$shelter->address,$shelter->postal_code,$shelter->city,$shelter->active,$shelter->ukraine]);
        }
        return view('account.shelters')->with(["data"=>$arr]);
    }
}
