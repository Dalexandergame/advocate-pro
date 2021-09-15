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
            'indirect_pour',
            'indirect_contre',
            'commentaire',
            'tribunal_number',
            'file_number',
            'compte_pour',
            'compte_contre',
            'user_id',
        ];
    protected $dates = [
        'dateaudiance',
        'date_creation',
     ];

    public function taches()
    {
        return $this->hasMany('App\Models\Tache');
    }

     public function user()
    {
        return $this->belongsTo('App\Models\User' , 'user_id');
    }

    public function for()
    {
        return $this->belongsTo('App\Models\Clientcompte' , 'compte_pour');
    }
    
    public function against()
    {
        return $this->belongsTo('App\Models\Clientcompte' , 'compte_contre');
    }

     public function indirectfor()
    {
        return $this->belongsTo('App\Models\Clientcompte' , 'indirect_pour');
    }
    
    public function indirectagainst()
    {
        return $this->belongsTo('App\Models\Clientcompte' , 'indirect_contre');
    }

    public function frais()
    {
        return $this->hasMany('App\Models\Frais' , 'frais');
    }

    public function dossierPayment()
    {
        return $this->hasMany('App\Models\DossierPayment' , 'dossierPayment');
    }
}
