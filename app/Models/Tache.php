<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
            'titre',
            'type',
            'user_id',
            'description',
            'parent_id',
            'etat',
            'dossier_num',
            'assigned_user_id',
        ];
    protected $dates = [
        'dateaudiance',
        'dateecheance',
     ];

    public function getUsers()
    {
        return $this->belongsTo('App\Models\User' , 'user_id');
    }

    public function assignedUsers()
    {
        return $this->belongsTo('App\Models\User' , 'assigned_user_id');
    }
    
    public function getDossierjuridique()
    {
        return $this->belongsTo('App\Models\dossierjuridique' , 'dossier_num' ,'file_number');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
