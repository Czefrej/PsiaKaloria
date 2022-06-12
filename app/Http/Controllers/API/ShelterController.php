<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AnimalShelter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShelterController extends Controller
{
    //

    public function index(){
        $ash = AnimalShelter::select("id","name","active","ukraine","city","address","country","email","phone","postal_code","map_latitude","map_longitude","voivodeship")->where("active",true)->orderBy("voivodeship","desc")->orderBy('city','asc')->get();
        return response()->json($ash);
    }

    public function show($id){
        $ash = AnimalShelter::findOrFail($id,['id', 'name',"active","ukraine","city","address","country","postal_code","map_latitude","map_longitude","voivodeship"]);
        return response()->json($ash);
    }
}
