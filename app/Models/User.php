<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use App\Traits\HasRolesAndPermissions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRolesAndPermissions, Billable;
    
    public function taches()
    {
        return $this->hasMany('App\Models\Tache');
    }

     public function missions()
    {
        return $this->hasMany('App\Models\Mission');
    }

    public function missionspayments()
    {
        return $this->hasMany(MissionPayment::class);
    }

    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }
    
     public function dossiers()
    {
        return $this->hasMany('App\Models\dossierjuridiques');
    }

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'num_tel',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = ['id'];

    public function Jurisprudences()
    {
        return $this->hasMany(Jurisprudence::class);

    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
      $this->notify(new CustomResetPassword($token));
    }
}
