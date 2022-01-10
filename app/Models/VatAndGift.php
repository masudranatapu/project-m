<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VatAndGift extends Model
{
    use HasFactory;
    protected $fillable = [
        'vat_amount',
        'gift_amount',
        'status',
    ];
}
