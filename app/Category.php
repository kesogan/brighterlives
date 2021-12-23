<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['category_name', 'slug', 'category_description', 'is_active'];

    /**
     * Create the slug from the category_name.
     */
    public function setSlugAttribute($value)
    {
        // grab the category_name and slugify it
        $this->attributes['slug'] = str_slug($this->category_name);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function products()
    {
        return $this->hasMany(Produce::class, 'category_id');
    }

}
