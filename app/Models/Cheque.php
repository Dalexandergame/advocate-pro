<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;

    protected $fillable = ['serial_number','screen'];

    public function user ()
    {
        $this->belongsTo(User::class);
    }
}
