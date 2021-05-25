<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function mainCategory()
    {
        return $this->hasMany(self::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(self::class, 'parent_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    use HasFactory;
}
