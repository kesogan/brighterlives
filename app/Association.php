<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Association extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'association_name',
        'association_address',
        'association_contact',
        'association_description',
        'association_email',
        'association_logo',
        'association_momo_master',
        'owner_id',
        'is_active'
    ];
    
    public function ratings()
    {
        return $this->morphMany('App\Rating', 'rateable');
    }

    public function owner(){
        return $this->belongsTo(User::class,'owner_id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
