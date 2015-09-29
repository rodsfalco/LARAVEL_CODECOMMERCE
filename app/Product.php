<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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

    public function tags() {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getTagListAttribute() {
        $tags = $this->tags()->lists('name')->all();

        return implode(',', $tags);
    }
}