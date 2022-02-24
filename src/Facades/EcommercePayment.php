<?php

namespace ZarulIzham\EcommercePayment\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ZarulIzham\EcommercePayment\EcommercePayment
 */
class EcommercePayment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ZarulIzham\EcommercePayment\EcommercePayment::class;
    }
}
