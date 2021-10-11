<?php

use PragmaRX\Countries\Package\Countries;

function convertToPhone(String $string){
    return str_replace("-","",str_replace(" ","",$string));
}

function convertToName(String $string){
    $string = implode('-', array_map('ucfirst', explode('-', mb_strtolower($string))));
    return ucwords($string);
}

function cca2Verify(String $cca2){
    $countries = new Countries();
    return $countries->where("cca2",$cca2)->count() > 0;
}

