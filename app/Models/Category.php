<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =[
        'name' , 'slug'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    
    use HasFactory;
}
