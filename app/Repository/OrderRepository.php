<?php

namespace App\Repository;

use App\Entity\Order;

class OrderRepository
{
    public function getLatest()
    {
        return Order::latest()->get();
    }
}
