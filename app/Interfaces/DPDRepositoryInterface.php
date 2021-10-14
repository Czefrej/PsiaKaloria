<?php

namespace App\Interfaces;

interface DPDRepositoryInterface
{

    public function getPackageStatus(string $tracking_number);

    public function getPackageStatusHistory(string $tracking_number);
}
