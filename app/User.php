<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail 
{
    use  HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name','first_name', 'email','phone','password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Generate default password for user.
     */
    public static function generatePassword()
    {
      // Generate random string and encrypt it. 
      return bcrypt(str_random(35));
    }

    public function association()
    {
        return $this->belongsTo('App\Association', 'owner_id');
    }
        /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
