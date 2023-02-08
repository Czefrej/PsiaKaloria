<?php

function getEstimatedDelivery(bool $barf)
{
    $weekday = date('w');
    if ((! $barf and $weekday > 0 and $weekday <= 5) or ($barf and $weekday > 0 and $weekday <= 3)) {
        if (date('H') < 10) {
            $datetime = new DateTime('today');
        } else {
            if ($weekday == 5) {
                $datetime = new DateTime('today');
                $datetime->modify('next monday');
            } else {
                $datetime = new DateTime('tomorrow');
            }
        }
    } else {
        $datetime = new DateTime('today');
        $datetime->modify('next monday');
    }

    $delivery_date = $datetime->format('d.m');
    $delivery_day = $datetime->format('D');

    return "$delivery_day ($delivery_date)";
}

function renderStars(int $num_of_stars)
{
    if ($num_of_stars < 0) {
        $num_of_stars = 0;
    } elseif ($num_of_stars > 5) {
        $num_of_stars = 5;
    }

    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="54" height="10" viewBox="0 0 54 10"><g id="Group_38367" data-name="Group 38367" transform="translate(-384 -2649)">';
    $x = 384;
    $y = 2648.509;

    for ($i = 1; $i < 6; $i++) {
        if ($i <= $num_of_stars) {
            $svg .= '<path id="star_'.$i.'" data-name="star-'.$i.'" d="M9.974,4.27a.536.536,0,0,0-.458-.381L6.63,3.615,5.489.828a.523.523,0,0,0-.977,0L3.37,3.615.483,3.889a.537.537,0,0,0-.457.381.57.57,0,0,0,.155.589l2.182,2L1.72,9.813a.567.567,0,0,0,.207.573.51.51,0,0,0,.584.027L5,8.86l2.489,1.553a.511.511,0,0,0,.584-.027.567.567,0,0,0,.207-.573L7.636,6.856l2.182-2a.571.571,0,0,0,.156-.59Zm0,0" transform="translate('.$x.' '.$y.')" fill="#ffc107"/>';
        } else {
            $svg .= '<path id="star_'.$i.'" data-name="star-'.$i.'" d="M2.239,10.492a.515.515,0,0,1-.311-.106.567.567,0,0,1-.207-.573l.643-2.957-2.182-2a.57.57,0,0,1-.156-.589A.537.537,0,0,1,.484,3.89L3.37,3.616,4.512.829a.523.523,0,0,1,.978,0L6.631,3.616l2.886.273a.536.536,0,0,1,.458.381.57.57,0,0,1-.155.589l-2.182,2,.643,2.957a.567.567,0,0,1-.207.573.512.512,0,0,1-.584.027L5,8.861,2.511,10.414a.516.516,0,0,1-.273.079ZM5,8.192a.516.516,0,0,1,.273.079L7.622,9.737,7.015,6.946a.569.569,0,0,1,.168-.54L9.244,4.52,6.518,4.262a.533.533,0,0,1-.442-.336L5,1.3,3.923,3.926a.532.532,0,0,1-.44.335L.757,4.519,2.817,6.4a.568.568,0,0,1,.168.541L2.379,9.736,4.728,8.271A.516.516,0,0,1,5,8.192ZM3.348,3.67h0Zm3.3,0h0Zm0,0" transform="translate('.$x.' '.$y.')" fill="#fb1"/>';
        }
        $x += 11;
    }

    $svg .= '</g></svg>';

    return $svg;
}

function renderCart(int $num_of_products)
{
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="21.231" viewBox="0 0 24 21.231">
  <defs>
    <clipPath id="clip-path">
      <rect width="24" height="21.231" fill="none"/>
    </clipPath>
  </defs>
  <g id="Repeat_Grid_1" data-name="Repeat Grid 1" clip-path="url(#clip-path)">
    <g transform="translate(-310 -17.385)">
      <path id="Path_40103" data-name="Path 40103" d="M22.221,38.919h-.665l-4.5-5.958a.924.924,0,0,0-1.292-.186.946.946,0,0,0-.185,1.308l3.655,4.835H6.75l3.655-4.835a.936.936,0,0,0-.175-1.308.923.923,0,0,0-1.292.186l-4.5,5.958H3.759a2.784,2.784,0,0,0,0,5.568h.018l.831,7.674a1.844,1.844,0,0,0,1.828,1.661H19.553a1.853,1.853,0,0,0,1.837-1.661l.822-7.674h.009a2.784,2.784,0,0,0,0-5.568ZM5.633,44.487H8.615l.3,3.007H5.956Zm.8,7.47-.277-2.608H9.095l.258,2.608Zm8.455.009-3.683-.009-.258-2.608h4.145Zm.582-7.47-.231,3H10.765l-.3-3v-.009h5Zm4.08,7.47H16.747l.2-2.617h2.889Zm.48-4.473H17.088l.231-2.988h3.037Zm2.188-4.863H3.759a.928.928,0,0,1,0-1.856H22.221a.93.93,0,0,1,.923.937A.92.92,0,0,1,22.221,42.631Z" transform="translate(309.01 -15.206)" fill="#0d1521"/>
    </g>
  </g>
</svg><span class="cart-counter"><span id="counter">'.$num_of_products.'</span></span>';

    return $svg;
}
