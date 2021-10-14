<?php

namespace App\Http\Controllers;

use App\Interfaces\DPDRepositoryInterface;
use App\Models\Package;
use App\Models\PackageStatusHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class DPDController extends Controller
{
    public function __construct(DPDRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function update(){

        $packages = Package::getNotDelivered(['dpd']);
        foreach ($packages as $p){
            $response = $this->repository->getPackageStatusHistory($p->tracking_number)->getEvents();
            $i = 0;
            $c = 0;
            foreach ($response as $event) {
                $date_time = $event->getEventTime()->format(DATE_ATOM);
                $business_code = $event->getBusinessCode();

                $date_time = Carbon::parse($date_time)->format('Y-m-d H:i:s');
                $depot_code = $event->getDepot();
                $depot_name = $event->getDepotName();
                $country_cca2 = $event->getCountry();
                $status = Config::get("dpd_mappings.package_status.$business_code.system_status") ?: "unknown";
                if ($status == "return" && !empty($event->getAdditionalData())) {
                    foreach ($event->getAdditionalData() as $additional_data) {
                        $event_additional_data[] = $additional_data->getValue();
                    }
                    $return_package_tracking = $event_additional_data[0];
                    if (!Package::exists($p->order,$return_package_tracking))
                        Package::add($p->order,$return_package_tracking,'dpd',$p);
                }
                if(!PackageStatusHistory::exists($p,$date_time)){
                    PackageStatusHistory::appendRecord($p,$business_code,$date_time,$depot_code,$depot_name,$country_cca2);
                }

                if($i == $c){
                    if($status != "unknown") {
                        try {
                            $p->updateStatus($status);
                        } catch (\Exception $exception) {
                            $status = "could_not_resolve";
                            $p->updateStatus($status);
                        }
                    }else $c++;
                }

                $i++;
            }
        }

        return response()->json([
            'status'=>'SUCCESS'
        ]);

    }
}
