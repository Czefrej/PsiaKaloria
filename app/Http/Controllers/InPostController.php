<?php

namespace App\Http\Controllers;

use App\Interfaces\InPostRepositoryInterface;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class InPostController extends Controller
{
    public function __construct(InPostRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function update(){

        $packages = Package::getNotDelivered(['paczkomaty','inpostkurier']);
        foreach ($packages as $p){
            try {
                $response = $this->repository->getPackageStatus($p->tracking_number);
                $status = Config::get("inpost_mappings.package_status.$response->status.system_status") ?: "unknown";
                $p->updateStatus($status);
                echo "updated $p->tracking_number ".PHP_EOL;
            }catch (\Exception $exception){
                $status = "could_not_resolve";
                dd($p->updateStatus($status));
            }
        }

    }
}
