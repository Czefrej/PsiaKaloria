<?php

return [
    'baselinker' => [
        'delivery' => [
            'Allegro Paczkomaty InPost' => 'Allegro Smart Paczkomaty InPost',
            'Allegro Kurier DPD' => 'Allegro Smart Kurier DPD',
            'Allegro Kurier24 InPost pobranie' => 'Allegro Smart Kurier InPost',
            'Allegro Kurier DPD pobranie' => 'Allegro Smart Kurier DPD',
            'Allegro Kurier24 InPost' => 'Allegro Smart Kurier InPost',
            'Kurier DPD pobranie' => 'Kurier DPD',
            'Odbiór osobisty w punkcie sprzedawcy' => 'Odbiór osobisty',
        ],
        'payment' => [
            'Pobranie' => 'Płatność przy odbiorze',
            'Przelew' => 'Przelew bankowy tradycyjny',
            'Przelew błyskawiczny lub karta płatnicza' => 'Przelewy24',

        ],
        'sources' => [
            0 => 'personal',
            6191 => 'allegro',
            3002403 => 'store_old',
        ],
        'sources_reversed' => [
            'personal' => 0,
            'allegro' => 6191,
            'store_old' => 3002403,
        ],
        'status' => [
            27677 => [
                'name' => 'Zamówienie nieopłacone',
                'name_for_customer' => 'Oczekuje na płatność',
                'color' => '#dbdbdb',
                'system_status' => 'unpaid',
            ],
            37449 => [
                'name' => 'Import zamówienia',
                'name_for_customer' => 'Zamówienie zostało zrealizowane i oczekuje na odbiór przez kuriera',
                'color' => '#62f54f',
                'system_status' => 'packed',
            ],
            37451 => [
                'name' => 'Utwórz fakturę',
                'name_for_customer' => 'Zamówienie zostało zrealizowane i oczekuje na odbiór przez kuriera',
                'color' => '#62f54f',
                'system_status' => 'packed',
            ],
            37457 => [
                'name' => 'Zamówienia spakowane',
                'name_for_customer' => 'Zamówienie zostało zrealizowane i oczekuje na odbiór przez kuriera',
                'color' => '#4f97f5',
                'system_status' => 'packed',
            ],
            37458 => [
                'name' => 'Wystąpił błąd importu',
                'name_for_customer' => 'Zamówienie jest realizowane',
                'color' => '#f54f4f',
                'system_status' => 'packed',
            ],
            42837 => [
                'name' => 'Kurier DPD',
                'name_for_customer' => 'Zamówienie jest realizowane',
                'color' => '#fa2f2f',
                'system_status' => 'paid',
            ],
            42838 => [
                'name' => 'InPost',
                'name_for_customer' => 'Zamówienie jest realizowane',
                'color' => '#f5e24f',
                'system_status' => 'paid',
            ],
            42839 => [
                'name' => 'InPost WKN (Sobota)',
                'name_for_customer' => 'Zamówienie jest realizowane',
                'color' => '#000000',
                'system_status' => 'paid',
            ],
            42840 => [
                'name' => 'Zamówienie do importu',
                'name_for_customer' => 'Zamówienie zostało zrealizowane i oczekuje na odbiór przez kuriera',
                'color' => '#62f54f',
                'system_status' => 'packed',
            ],
            42841 => [
                'name' => 'Odebrane przez kuriera',
                'name_for_customer' => 'Zamówienie zostało wysłane',
                'color' => '#9ce8af',
                'system_status' => 'sent',
            ],
            42847 => [
                'name' => 'W punkcie odbioru',
                'name_for_customer' => 'Oczekuje na odbiór w punkcie odbioru',
                'color' => '#4ff5f5',
                'system_status' => 'in_pickup_point',
            ],
            42848 => [
                'name' => 'Dostarczone',
                'name_for_customer' => 'Dostarczone',
                'color' => '#63bf4c',
                'system_status' => 'delivered',
            ],
            42854 => [
                'name' => 'Anulowane',
                'name_for_customer' => 'Zamówienie zostało anulowane',
                'color' => '#de4242',
                'system_status' => 'cancelled',
            ],
            42855 => [
                'name' => 'Zamówienie zwrócone',
                'name_for_customer' => 'Zamówienie zostało zwrócone',
                'color' => '#f54ff5',
                'system_status' => 'returned',
            ],
            42856 => [
                'name' => 'Zamówienie zareklamowane',
                'name_for_customer' => 'Zamówienie zostało zareklamowane',
                'color' => '#8a7554',
                'system_status' => 'complained',
            ],
            42857 => [
                'name' => 'Oczekuje na przelew',
                'name_for_customer' => 'Oczekuje na płatność',
                'color' => '#bfb9b0',
                'system_status' => 'unpaid',
            ],
            60855 => [
                'name' => 'Odbiór osobisty',
                'name_for_customer' => 'Zamówienie oczekuje na odbiór - prosimy o telefon w celu umówienia terminu',
                'color' => '#f2eee9',
                'system_status' => 'paid',
            ],
        ],
        'status_reversed' => [
            'unpaid' => 27677,
            'sent' => 42841,
            'returned' => 42855,
            'delivered' => 42848,
            'in_pickup_point' => 42847,
        ],
    ],
];
