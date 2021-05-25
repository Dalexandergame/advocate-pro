<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function subcategory()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }


    use HasFactory;
}
