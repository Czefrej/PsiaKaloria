<?php

namespace App\Http\Controllers;

use App\Models\AnimalShelter;
use Illuminate\Http\Request;

class ShelterController extends Controller
{
    //

    public function index(Request $request)
    {
        $shelters = AnimalShelter::all();
        $arr = [];
        foreach ($shelters as $shelter){
            array_push($arr,[$shelter->name,$shelter->address,$shelter->postal_code,$shelter->city,$shelter->active,$shelter->ukraine,"<a class='text-primary' href='/account/shelter/$shelter->id/edit'>Zarządzaj</a>"]);
        }
        return view('account.shelter.index')->with(["data"=>$arr]);
    }

    public function edit($id)
    {
        $shelter = AnimalShelter::findOrFail($id);
        return view('account.shelter.edit')->with("shelter",$shelter);
    }

    public function show($id){
        return redirect()->route('account.shelter.edit',$id);
    }

    public function create(){
        return view('account.shelter.create');
    }


}


