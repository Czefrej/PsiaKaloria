<?php

namespace App\Utils;

use App\Interfaces\DPDRepositoryInterface;
use T3ko\Dpd\Api;
use T3ko\Dpd\Objects\Enum\TrackingEventsCount;
use \T3ko\Dpd\Request\GetParcelTrackingRequest;

class DPDRepository implements DPDRepositoryInterface
{

    public function __construct(){
        $this->api = new Api(env("DPD_API_LOGIN"), env("DPD_API_PASSWORD"), env("DPD_API_FID"));
    }

    public function getPackageStatus(string $tracking_number)
    {
        $request = GetParcelTrackingRequest::fromWaybill($tracking_number, TrackingEventsCount::ONLY_LAST());
        return $this->api->getParcelTracking($request);
    }

    public function getPackageStatusHistory(string $tracking_number)
    {
        $request = GetParcelTrackingRequest::fromWaybill($tracking_number, TrackingEventsCount::ALL());
        return $this->api->getParcelTracking($request);
    }
}
