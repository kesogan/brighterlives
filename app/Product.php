<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected const LIMITEDAMOUNT = 5;
   // use SoftDeletes;
    protected $fillable = [
        'association_id',
        'category_id',
        'product_name',
        'product_code',
        'is_featured',
        'is_active',
        'slug',
        'product_description',
        'price',
        'quantity',
        'creator',
        'creator_brief_description',
        'rating'
    ];
    protected $hidden = [];

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'pictureable');
    }

        public function ratings()
    {
        return $this->morphMany('App\Rating', 'rateable');
    }

    /**
     * Create the slug from the product_name.
     */
    public function setSlugAttribute($value)
    {
        // grab the product_name and slugify it
        $this->attributes['slug'] = str_slug($this->product_name);
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'expiry_date',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'float',
        'quantity' => 'integer',
    ];

    public function scopeAssociation($query)
    {
        return $query->where('association_id', auth()->user()->association()->id);
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activePictures()
    {
        return $this->hasMany(Picture::class, 'product_id')->where('is_active', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity', 'price')->withTimestamps();
    }


    public function scopeAdmin($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    public function scopeAssociationOwner($query)
    {
        return $query->where('association_id', auth()->user()->association->id);
    }

    /**
     * @return string
     */
    public function getRatingAttribute()
    {
        return number_format(\DB::table('ratings')->where('product_id', $this->attributes['id'])->average('rating'), 2);
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

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeDelivered($query)
    {
        return $query->where('is_delivered', 1);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeAvailable($query)
    {
        return $query->where('quantity', '>', 0);
    }

    /**
     * @return bool
     */
    public function is_new()
    {
        if ($this->created_at > now()->subWeek(1)) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function is_limited()
    {
        if ($this->quantity < self::LIMITEDAMOUNT) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function is_instock()
    {
        if ($this->quantity > 0) {
            return true;
        }

        return false;
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeLimited($query)
    {
        return $query->where('quantity', '<=', self::LIMITEDAMOUNT);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeBestSeller($query)
    {
        $products = OrderProduct::select('product_id', DB::raw('count(product_id) as count'))->groupBy('product_id')->orderBy('count', 'desc')->take(3)->get();
        $product_ids = [];
        foreach ($products as $product) {
            array_push($product_ids, $product->product_id);
        }

        return $query->whereIn('id', $product_ids);
    }
}
