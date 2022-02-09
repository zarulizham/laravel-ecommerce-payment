<?php

namespace App\Http\Controllers\Ecommerce;

use ZarulIzham\EcommercePayment\Http\Requests\AuthorizationConfirmation as Request;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use ZarulIzham\EcommercePayment\Ecommerce;

class Controller extends BaseController
{

    /**
     * @param Request $request
     * @return Response
     */
    public function callback(Request $request)
    {
        $response = $request->handle();
        // Update your order status

        return response()->make('OK', 200);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function webhook(Request $request)
    {
        $response = $request->handle();
        // Update your order status

        return 'OK';
    }

    /**
     * @param Request $request
     * @return string
     */
    public function initiatePayment(Request $request)
    {
        return view('ecommerce-payment::payment');
    }
}
