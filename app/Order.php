<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        protected $fillable = [
        'order_code',
        'buyer_id',
        'is_paid',
        'payment_type',
        'order_level',
        'error',
        'total_price',
        'is_delivered',
        'delivery_date',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $helper = new Helper();
            $model->order_code = strtoupper(str_random(5)).''.$helper->randomDigits(10);
        });
    }

      /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'delivery_date',
    ];

    protected $casts = [
        'is_paid' => 'boolean',
        'is_delivered' => 'boolean',
        'total_price' => 'float',
        'payment_type' => 'enum',
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withTimestamps();
    }

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

}
