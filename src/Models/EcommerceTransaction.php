<?php

namespace ZarulIzham\EcommercePayment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceTransaction extends Model
{
    use HasFactory;

    protected $casts = [
        'request_payload' => 'object',
        'response_payload' => 'object',
    ];
}
