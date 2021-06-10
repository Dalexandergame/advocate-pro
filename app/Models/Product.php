<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function demands()
    {
        return $this->belongsToMany(Demand::class);
    }
}
