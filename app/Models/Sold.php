<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'order_code',
        'product_id',
        'product_code',
        'name',
        'quantity',
    ];
}