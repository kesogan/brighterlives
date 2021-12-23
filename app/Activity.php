<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'activity_name',
        'slug',
        'activity_description',
        'association_id',
        'category_id',
        'creator',
        'creator_brief_description',
        'is_active',
        'is_featured'
    ];
    /**
     * Undocumented function
     *
     * @return void
     */
     public function pictures()
    {
        return $this->morphMany(Picture::class, 'pictureable');
    }
    /**
     * rating
     *
     * @return void
     */
    public function ratings()
    {
        return $this->morphMany('App\Rating', 'rateable');
    }
    /**
     * @param $query
     *
     * @return mixed
     */
     public function scopeAdmin($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeAssociationOwner($query)
    {
        return $query->where('association_id', auth()->user()->association->id);
    }

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function association()
    {
        return $this->belongsTo(Association::class, 'association_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}