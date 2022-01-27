<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'shipping_name',
        'shipping_email',
        'shipping_division_id',
        'shipping_district_id',
        'shipping_thana_code',
        'shipping_phone',
        'shipping_address',
    ];
}
