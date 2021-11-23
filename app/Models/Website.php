<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'logo',
        'favicon',
        'phone',
        'fax',
        'tel',
        'address',
        'icon',
        'link',
    ];
}
