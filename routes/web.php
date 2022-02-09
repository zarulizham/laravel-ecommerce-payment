<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Ecommerce\Controller;
use ZarulIzham\EcommercePayment\Http\Controllers\PaymentController;

Route::middleware(['web'])->group(function () {

    $directPath = Config::get('ecommerce.direct_path');
    $callbackPath = Config::get('ecommerce.callback_path');

    Route::post('ecommerce/payment/auth', [PaymentController::class, 'handle'])->name('ecommerce.payment.auth.request');

    Route::post($directPath, [Controller::class, 'webhook'])->name('ecommerce.payment.direct');
    Route::post($callbackPath, [Controller::class, 'callback'])->name('ecommerce.payment.callback');

    Route::match(
        ['get', 'post'],
        'ecommerce/initiate/payment',
        [Controller::class, 'initiatePayment']
    )->name('ecommerce.initiate.payment');
});
