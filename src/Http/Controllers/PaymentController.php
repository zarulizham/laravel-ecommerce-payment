<?php

namespace ZarulIzham\EcommercePayment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ZarulIzham\EcommercePayment\Messages\AuthorizationRequest;

class PaymentController extends Controller
{

    /**
     * Initiate the request authorization message to FPX
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        return view('ecommerce-payment::redirect_to_bpg', [
            'request' => (new AuthorizationRequest)->handle($request->all()),
        ]);
    }
}
