<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';
    protected $fillable = ['pictureable_id', 'url', 'pictureable_type','is_active','is_featured'];


    public function pictureable()
    {
        return $this->morphTo();
    }


}