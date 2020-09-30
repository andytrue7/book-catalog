<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Entity\User');
    }

    public function book()
    {
        return $this->belongsTo('App\Entity\Book');
    }
}
