<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossierjuridique extends Model
{
    use HasFactory;

    protected $fillable = [
            'tagwords',
            'type_dossier',
            'client_direct',
            'client_indirect',
            'comments',
            'tribunal_number',
            'file_number',
        ];
    protected $dates = [
        'dateaudiance',
        'date_creation',
     ];

    public function taches()
    {
        return $this->hasMany('App\Models\Tache');
    }
}
