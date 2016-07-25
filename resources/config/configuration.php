<?php

return [
    'amount' => [
        'required' => true,
        'type'     => 'anomaly.field_type.text'
    ],
    'scope'  => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'default_value' => 'cart',
            'mode'          => 'radio',
            'options'       => [
                'cart'  => 'anomaly.extension.fixed_amount_discount::configuration.scope.option.cart',
                'items' => 'anomaly.extension.fixed_amount_discount::configuration.scope.option.items',
            ]
        ]
    ],
];