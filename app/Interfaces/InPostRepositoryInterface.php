<?php

namespace App\Interfaces;

interface InPostRepositoryInterface
{
    public function getquery(string $method); // if you passinga  variable -> public function getquery('variable1');

    public function getPackageStatus(string $tracking_number);
}
