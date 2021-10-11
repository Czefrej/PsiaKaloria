<?php
function getEstimatedDelivery(bool $barf){
    $weekday = date('w');
    if ((!$barf and $weekday>0 and $weekday<=5) or ($barf and $weekday>0 and $weekday<=3)){
        if (date('H')<10) {
            $datetime = new DateTime('today');
        }else{
            if($weekday == 5){
                $datetime = new DateTime('today');
                $datetime->modify('next monday');
            }else
                $datetime = new DateTime('tomorrow');
        }

    }else {
        $datetime = new DateTime('today');
        $datetime->modify('next monday');
    }

    $delivery_date = $datetime->format('d.m');
    $delivery_day = $datetime->format('D');

    return "$delivery_day ($delivery_date)";
}
