<?php

namespace ZarulIzham\EcommercePayment;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ZarulIzham\EcommercePayment\Commands\EcommercePaymentCommand;

class EcommercePaymentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-ecommerce-payment')
            ->hasConfigFile('ecommerce')
            ->hasViews()
            ->hasRoute('web')
            ->hasMigration('create_ecommerce_transactions_table')
            ->hasCommand(EcommercePaymentCommand::class);

        // dd("{$this->package->shortName()}");
        $this->publishes([
            $this->package->basePath('/../stubs/Controller.php') => app_path("Http/Controllers/Ecommerce/Controller.php"),
        ], "{$this->package->shortName()}-controller");

        $this->loadViewsFrom(base_path("resources/views/vendor/{$this->package->shortName()}"), "{$this->package->shortName()}");
    }
}
