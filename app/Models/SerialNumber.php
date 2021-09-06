<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerialNumber extends Model
{
    protected $table = 'serial_numbers';

    protected $guarded = [];
    
    use HasFactory;
}
