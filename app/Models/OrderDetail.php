<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
