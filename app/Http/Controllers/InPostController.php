<?php

namespace App\Http\Controllers;

use App\Interfaces\InPostRepositoryInterface;
use App\Models\Package;
use App\Models\PackageStatusHistory;
use Carbon\Carbon;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Config;

class InPostController extends Controller
{
    public function __construct(InPostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function update()
    {
        $packages = Package::getNotDelivered(['paczkomaty', 'inpostkurier']);
        foreach ($packages as $p) {
            try {
                $response = $this->repository->getPackageStatus($p->tracking_number);
                foreach ($response->tracking_details as $record) {
                    $depot_code = $record->origin_status;
                    $depot_name = '';
                    $country = 'PL';
                    $date_time = Carbon::parse($record->datetime)->format('Y-m-d H:i:s');
                    if (! PackageStatusHistory::exists($p, $date_time)) {
                        PackageStatusHistory::appendRecord($p, $record->status, $date_time, $depot_code, $depot_name, $country);
                    }
                }
            } catch (ClientException $exception) {
                //Tracking number no longer exists
            }

            try {
                $response = $this->repository->getPackageStatus($p->tracking_number);
                $status = Config::get("inpost_mappings.package_status.$response->status.system_status") ?: 'unknown';
                $p->updateStatus($status);
            } catch (ClientException $exception) {
                //Tracking number no longer exists
                $status = 'could_not_resolve';
                $p->updateStatus($status);
            }
        }

        return response()->json([
            'status' => 'SUCCESS',
        ], 200);
    }
}
