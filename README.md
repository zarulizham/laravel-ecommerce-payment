# Malaysia payment gateway for eCommerce

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zarulizham/laravel-card-ecommerce.svg?style=flat-square)](https://packagist.org/packages/zarulizham/laravel-card-ecommerce)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/zarulizham/laravel-card-ecommerce/run-tests?label=tests)](https://github.com/zarulizham/laravel-card-ecommerce/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/zarulizham/laravel-card-ecommerce/Check%20&%20fix%20styling?label=code%20style)](https://github.com/zarulizham/laravel-card-ecommerce/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/zarulizham/laravel-card-ecommerce.svg?style=flat-square)](https://packagist.org/packages/zarulizham/laravel-card-ecommerce)

## Installation

You can install the package via composer:

```bash
composer require zarulizham/laravel-ecommerce-payment
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="ecommerce-payment-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="ecommerce-payment-config"
```

You can publish the controller file with:

```bash
php artisan vendor:publish --tag="ecommerce-payment-controller"
```

This is the contents of the published config file:

```php
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
];
```

Sample .env

```
ECOMMERCE_PASSWORD=
ECOMMERCE_MERCHANT_ACCOUNT_NO=
ECOMMERCE_PAYMENT_WINDOW_URL=https://3dgatewaytest.ambankgroup.com/BPG/admin/payment/PaymentWindow.jsp
ECOMMERCE_DIRECT_PATH=BPG/ecommerce/redirect
ECOMMERCE_DIRECT_URL="${APP_URL}/BPG/ecommerce/redirect"
ECOMMERCE_CALLBACK_PATH=BPG/ecommerce/callback
ECOMMERCE_CALLBACK_URL="${APP_URL}/BPG/ecommerce/callback"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-card-ecommerce-views"
```

## Usage

To test: URL/ecommerce/initiate/payment

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Zarul Zubir](https://github.com/zarulizham)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
