<?php
namespace App\Utils;

use App\Interfaces\BaselinkerRepositoryInterface;
use App\Models\Order;
use GuzzleHttp\Client;

class BaselinkerRepository implements BaselinkerRepositoryInterface
{

    public function getquery(string $method, array $params)
    {

        $client = new Client();
        $response = $client->post(env('BASELINKER_BASE_URL'),
            ['form_params' => ['token' => env('BASELINKER_SECRET'),'method'=>$method,'parameters'=>json_encode($params)]]);
        $json = json_decode($response->getBody());

        return $json;
    }

}
