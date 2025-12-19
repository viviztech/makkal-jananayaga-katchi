<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Razorpay API Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your Razorpay API keys for your application.
    | You can get your API keys from the Razorpay Dashboard.
    |
    */

    'key' => env('RAZORPAY_KEY', ''),
    'secret' => env('RAZORPAY_SECRET', ''),

    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    |
    | The currency in which payments will be processed.
    |
    */

    'currency' => env('RAZORPAY_CURRENCY', 'INR'),

    /*
    |--------------------------------------------------------------------------
    | Theme Color
    |--------------------------------------------------------------------------
    |
    | The theme color for the Razorpay checkout modal.
    |
    */

    'theme_color' => env('RAZORPAY_THEME_COLOR', '#dc2626'),
];
