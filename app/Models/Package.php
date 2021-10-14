<?php

namespace App\Models;

use App\Events\PackageChanged;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = "packages";
    protected $primaryKey = "id";
    public  $incrementing = true;
    public $timestamps = true;

    protected $dispatchesEvents = [
        'updated' => PackageChanged::class
    ];


    public function order(){
        return $this->belongsTo("App\Models\Order");
    }

    public static function add(Order $order,$tracking_number,$courier_type){
        $package = new Package();
        $package->tracking_number = $tracking_number;
        $package->courier = $courier_type;
        $package->status = "created";
        $order->packages()->save($package);
        $package->save();

        return $package;
    }

    public static function exists(Order $order, $tracking_number){
        $package = Package::where('order_id',$order->id)->where('tracking_number',$tracking_number)->first();

        if($package != null)
            return $package;
        else return false;
    }

    public static function getNotDelivered(array $courier){
        $packages = Package::whereNotIn('status',['delivered','return','canceled','could_not_resolve'])->whereIn('courier',$courier)->get();
        return $packages;
    }

    public function updateStatus($status){
        if($this->status != $status && !empty($status)){
            $this->status = $status;
            $this->save();
        }
        return $this;
    }

    public function allPackagesHasTheSameStatus(){
        $target_status = $this->status;
        $packages = $this->order->packages;

        foreach ($packages as $package){
            if($package->status != $target_status)
                return false;
        }
        return true;
    }
}
