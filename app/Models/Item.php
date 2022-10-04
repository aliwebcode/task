<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define Attribute To Get Closest Discount
    protected $appends = ['final_discount'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Get Closest Discount
    public function getFinalDiscountAttribute()
    {
        // If Item Has Discount
        if($this->discount) {
            return $this->discount;
        } else {
            // Get Closest Category Discount
            return $this->category->getDiscount();
        }
    }
}
