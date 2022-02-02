<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frais extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function dossierjuridique()
    {
        return $this->belongsTo(Dossierjuridique::class, 'dossier_id');
    }
}
