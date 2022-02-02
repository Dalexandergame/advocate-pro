<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionPayment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','mission_id','payment_method','status'];

    public function mission() 
    {
        $this->belongsTo(Mission::class);
    }

    public function user() 
    {
        $this->belongsTo(User::class);
    }
    
}