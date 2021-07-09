<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandProduct extends Model
{
    use HasFactory;

    protected $table = 'demand_product';
    protected $fillable = ['demand_id', 'product_id', 'quantity'];

}
