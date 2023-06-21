<?php

namespace App\DTO;

class OrderDetailsDTO extends BaseDTO
{
    public function __construct(
        readonly public int $order_id,
        readonly public int $book_id,
        readonly public int $quantity,
        readonly public float $price_per_unit
    ) {
    }
}
