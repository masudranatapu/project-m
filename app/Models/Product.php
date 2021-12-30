<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_code',
        'user_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'brand_id',
        'size_id',
        'color_id',
        'name',
        'slug',
        'sell_price',
        'discount',
        'regular_price',
        'short_description',
        'long_description',
        'availability',
        'meta_description',
        'meta_keyword',
        'product_type',
        'thambnail',
        'multi_thambnail',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }
    public function subsubcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subsubcategory_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(SubCategory::class, 'brand_id', 'id');
    }
}
