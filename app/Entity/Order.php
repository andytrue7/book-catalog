<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function books()
    {
        return $this->belongsToMany('App\Entity\Book', 'book_order', 'order_id', 'book_id');
    }
}
