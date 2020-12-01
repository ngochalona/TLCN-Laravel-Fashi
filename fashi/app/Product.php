<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //1 product có nhiều attributes, kết bảng thông qua product_id

    public function attributes()
    {
        return $this->hasMany('App\ProductsAttributes', 'product_id');
    }
}
