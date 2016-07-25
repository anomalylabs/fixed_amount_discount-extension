<?php

return [
    'amount' => [
        'name'         => 'Discount Amount',
        'instructions' => 'Specify the discount amount or percentage (19.95 or 25%).',
    ],
    'scope'  => [
        'name'   => 'Scope',
        'option' => [
            'items' => 'Discount each item in cart',
            'cart'  => 'Discount the entire cart',
        ]
    ],
];