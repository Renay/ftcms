<?php

return [
    // НЕ ТРОГАТЬ, ЕСЛИ НЕ ЗНАЕШЬ ЧТО ЭТО ТАКОЕ
    'navigation' => [
        'view_path' => 'admin.navigation'
    ],

    // НЕ ТРОГАТЬ, ЕСЛИ НЕ ЗНАЕШЬ ЧТО ЭТО ТАКОЕ
    'merchant' => [
        'unitpay' => [
            'repository' => Merchant\Unitpay\Merchant::class
        ],
        'freekassa' => [
            'repository' => Merchant\Freekassa\Merchant::class,
        ]
    ],

    // {goods} заменяетяс на название товара, {name} на ник покупателя.
    'description_pay' => 'Покупка привилеги {goods} на сервере Diezel-Main на ник: {name}',

    // НЕ ТРОГАТЬ, ЕСЛИ НЕ ЗНАЕШЬ ЧТО ЭТО ТАКОЕ
    'services' => [
        Engine\Service\Database\Provider::class,
        Engine\Service\Request\Provider::class,
        Engine\Service\Navigation\Provider::class,
        Engine\Service\Merchant\Provider::class,
        Engine\Service\Validator\Provider::class,
    ]
];