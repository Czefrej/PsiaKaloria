<?php

use PragmaRX\Countries\Package\Countries;

function convertToPhone(string $string)
{
    return str_replace('-', '', str_replace(' ', '', $string));
}

function convertToName(string $string)
{
    $string = implode('-', array_map('ucfirst', explode('-', mb_strtolower($string))));

    return ucwords($string);
}

function cca2Verify(string $cca2)
{
    //$countries = new Countries();
    if (strtoupper($cca2) == 'PL') {
        return true;
    } else {
        return false;
    }
}
