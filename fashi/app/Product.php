<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Product extends Model
{
    use ElasticquentTrait;
    //1 product có nhiều attributes, kết bảng thông qua product_id
    public function attributes()
    {
        return $this->hasMany('App\ProductsAttributes', 'product_id');
    }
}
