<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageStatusHistory extends Model
{
    use HasFactory;

    protected $table = "package_status_history";
    public $incrementing = true;
    public $timestamps = true;

    public function package(){
        return $this->belongsTo("App\Models\Package");
    }

    public static function appendRecord(Package $package,string $system_code,string $datetime,string $depot_code,string $depot_name,string $country_cca2){
        if(!empty($country_cca2))
            throw_if(!cca2Verify($country_cca2),"Country code is invalid. ('$country_cca2')");


        $package_history = new PackageStatusHistory();
        $package_history->system_code = $system_code;
        $package_history->datetime = $datetime;
        $package_history->depot_code = $depot_code;
        $package_history->depot_name = $depot_name;
        $package_history->country = $country_cca2;
        $package->history()->save($package_history);
        $package_history->save();

        return $package_history;
    }

    public static function exists(Package $package, $datetime){
        $package_history = PackageStatusHistory::where('package_id',$package->id)->where('datetime',"$datetime")->first();

        if($package_history != null)
            return $package_history;
        else return false;
    }
}
