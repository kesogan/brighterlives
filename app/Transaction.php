<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_code',
        'transaction_logger',
        'transaction_type',
        'association_id',
        'model_id',
        'transaction_amount',
        'log_message'
    ];

    public function association()
    {
        return $this->belongsTo('App\Association', 'association_id');
    }
}
