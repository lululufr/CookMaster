<?php

return [
    'api_keys' => [
        'secret_key' => env('STRIPE_SECRET'),
        'publishable_key' => env('STRIPE_KEY'),
    ],
];
