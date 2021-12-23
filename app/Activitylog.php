<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitylog extends Model
{
    protected $table = 'activity_logs';
    protected $fillable = ['logger', 'model_id', 'log_action', 'log_message'];

    public function association()
    {
        return $this->belongsTo('App\Association', 'model_id');
    }

    public function scopeAssociation($query){
        return $query->where('model_id', auth()->user()->id);
    }
}
