<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierPayment extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function dossier() 
    {
        $this->belongsTo(Dossierjuridique::class);
    }

    public function user() 
    {
        $this->belongsTo(User::class);
    }
}
