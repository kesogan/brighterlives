<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id','rating','review','rateable_id','rateable_type'];
    
    public function rateable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
