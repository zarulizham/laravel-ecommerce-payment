<?php

namespace ZarulIzham\EcommercePayment\Commands;

use Illuminate\Console\Command;

class EcommercePaymentCommand extends Command
{
    public $signature = 'laravel-ecommerce-payment';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
