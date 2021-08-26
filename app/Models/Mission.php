<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    /**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'datecreation',
	    'dateecheance'
	 ];
   

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre',
        'description',
        'destination',
        'cout',
        'status',
        'user_id',
    ];
    
    public function getUsers()
    {
        return $this->belongsTo('App\Models\User' , 'user_id');
    }

    public function paymentMission()
    {
        return $this->hasOne(MissionPayment::class);
    }
}
