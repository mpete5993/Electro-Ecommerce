<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    protected $guarded = [];
    
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function  CategoryProduct($category){
        return null !== $this->category()->where('name', $category)->first();
    }
    use HasFactory;

    use Rateable;
}
