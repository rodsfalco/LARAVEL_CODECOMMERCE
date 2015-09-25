<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'featured',
        'recommend',
        'category_id'
    ];

    public function images() {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function category() {
        return $this->belongsTo('CodeCommerce\Category');
    }
}