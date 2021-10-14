<?php
namespace App\Interfaces;

interface BaselinkerRepositoryInterface
{
    public function getquery(string $method, array $data); // if you passinga  variable -> public function getquery('variable1');


}
