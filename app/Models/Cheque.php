<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','mission_id','dossierjuridique_id','serial_number','screen'];

    public function user ()
    {
        $this->belongsTo(User::class);
    }

    public function mission ()
    {
        $this->belongsTo(Cheque::class,'mission_id');
    }

    public function dossier ()
    {
        $this->belongsTo(Dossierjuridique::class,'dossier_id');
    }
}
