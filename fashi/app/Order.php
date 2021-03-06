<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orders()
    {
        // get through bill
        return $this->hasMany('App\Bill', 'order_id');
    }
}
