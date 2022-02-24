<?php
// config for ZarulIzham/EcommercePayment
return [
    'password' => env('ECOMMERCE_PASSWORD'),
    'merchant_account_no' => env('ECOMMERCE_MERCHANT_ACCOUNT_NO'),
    'payment_window_url' => env('ECOMMERCE_PAYMENT_WINDOW_URL'),
    'direct_path' => env('ECOMMERCE_DIRECT_PATH'),
    'direct_url' => env('ECOMMERCE_DIRECT_URL'),
    'callback_path' => env('ECOMMERCE_CALLBACK_PATH'),
    'callback_url' => env('ECOMMERCE_CALLBACK_URL'),
    'transaction_type' => env('ECOMMERCE_TRANSACTION_TYPE', 2),
    'response_type' => env('ECOMMERCE_RESPONSE_TYPE', 'HTTP'),
    'query_url' => env('ECOMMERCE_QUERY_URL'),
];
