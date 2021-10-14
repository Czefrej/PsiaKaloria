<?php

namespace App\Utils;

use App\Interfaces\InPostRepositoryInterface;
use GuzzleHttp\Client;

class InPostRepository implements InPostRepositoryInterface
{
    public function getquery(string $method)
    {
        $client = new Client();
        $response = $client->request('GET',"https://api-shipx-pl.easypack24.net/v1/$method",[
            'headers' => [
                'Content-Type'=>"application/json",
                "Authorization"=>"Bearer ".env('BASELINKER_BASE_URL')
            ]
        ]);
        $json = json_decode($response->getBody());

        return $json;
    }

    public function getPackageStatus(string $tracking_number){
        return $this->getquery("tracking/$tracking_number");
    }
}
