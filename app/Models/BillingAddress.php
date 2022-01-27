<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'billing_name',
        'billing_email',
        'billing_division_id',
        'billing_district_id',
        'billing_thana_code',
        'billing_phone',
        'billing_address',
    ];
}
