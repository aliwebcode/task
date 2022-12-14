<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // Get Closest Discount
    public function getDiscount()
    {
        if($this->discount)
            return $this->discount;
        else return null;
    }

}
