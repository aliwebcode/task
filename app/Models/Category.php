<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    const MAXIMUM_SUB_CATEGORIES = 4;

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function parentCount()
    {
        $current = $this->parent;
        if($current) {
            $count = 1;
            while($current->parent_id != null) {
                $current = $current->parent;
                $count++;
            }
            return $count;
        }
        return 0;
    }
    public function checkChildrenType()
    {
        if($this->children->count() > 0) {
            return 'category';
        } else if($this->items->count() > 0) {
            return 'item';
        } else {
            return null;
        }
    }
}
