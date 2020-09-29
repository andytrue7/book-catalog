<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable  = ['title', 'author', 'description', 'image'];
}
