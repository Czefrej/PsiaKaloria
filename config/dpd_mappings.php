<?php

return [
    'package_status' => [
        '030103' => ['title' => 'Przesyłka utworzona.', 'description' => 'Zarejestrowano dane przesyłki, przesyłka jeszcze nie nadana.', 'system_status' => 'created'],
        '040101' => ['title' => 'Przesyłka została wysłana.', 'description' => 'Przesyłka została odebrana przez kuriera.', 'system_status' => 'shipped'],
        '190101' => ['title' => 'Przesyłka doręczona.', 'description' => 'Przesyłka została doręczona przez kuriera.', 'system_status' => 'delivered'],
        '170310' => ['title' => 'Powiadomienie mail.', 'description' => 'Wysłano powiadomienie email.', 'system_status' => ''],
        '330135' => ['title' => 'Przyjęcie przesyłki w oddziale DPD', 'description' => 'Przyjęcie przesyłki w oddziale DPD.', 'system_status' => 'on_the_way'],
        '170102' => ['title' => 'Wydanie przesyłki do doręczenia.', 'description' => 'Wydanie przesyłki do doręczenia.', 'system_status' => 'out_for_delivery'],
        '330137' => ['title' => 'Przyjęcie przesyłki w oddziale DPD', 'description' => 'Przyjęcie przesyłki w oddziale DPD.', 'system_status' => 'on_the_way'],
        '170309' => ['title' => 'Powiadomienie SMS', 'description' => 'Wysłano powiadomienie SMS', 'system_status' => ''],
        '170304' => ['title' => 'Wysłano powiadomienie', 'description' => 'Wysłano powiadomienie', 'system_status' => ''],
        '320201' => ['title' => 'Magazynowanie przesyłki w oddziale.', 'description' => 'Magazynowanie przesyłki w oddziale.', 'system_status' => 'on_the_way'],
        '230403' => ['title' => 'Zwrot przesyłki.', 'description' => 'Zwrot przesyłki.', 'system_status' => 'return'],
    ],
];
