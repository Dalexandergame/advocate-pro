<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurisprudence extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function Users()
    {
        return $this->belongsTo(User::class, 'user_id');
        //return $this->belongsTo('App\Models\User' , 'user_id');
    }
}
