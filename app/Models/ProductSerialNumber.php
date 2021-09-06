<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSerialNumber extends Model
{
    protected $table = 'product_serial_numbers';

    protected $guarded =[];

    use HasFactory;
}
