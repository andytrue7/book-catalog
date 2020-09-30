<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function orders()
    {
        return $this->belongsToMany('App\Entity\Order', 'book_order', 'book_id', 'order_id');
    }
}
