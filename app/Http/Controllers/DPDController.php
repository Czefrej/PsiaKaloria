<?php

namespace App\Http\Controllers;

use App\Interfaces\DPDRepositoryInterface;
use App\Models\Package;
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
            try {
                $response = $this->repository->getPackageStatus($p->tracking_number)->getEvents()[0];
                $status = $response->getBusinessCode();
                $status = Config::get("dpd_mappings.package_status.$status.system_status") ?: "unknown";
                $p->updateStatus($status);
                echo "updated $p->tracking_number ".PHP_EOL;
            }catch (\Exception $exception){
                $status = "could_not_resolve";
                $p->updateStatus($status);
            }
        }

    }
}
