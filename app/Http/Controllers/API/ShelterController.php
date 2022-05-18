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
        $ash = AnimalShelter::select("id","name","active","ukraine","city","address","country","postal_code","email","phone","map_latitude","map_longitude")->where("active",true)->orderBy('ukraine','desc')->orderBy('city','asc')->get();
        return response()->json($ash);
    }
}
