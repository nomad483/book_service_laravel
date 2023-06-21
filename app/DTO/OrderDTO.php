<?php

namespace App\DTO;

class OrderDTO extends BaseDTO
{
    public function __construct(
        public readonly int $customer_id,
        public readonly string $date,
        public readonly int $total_amount
    ) {
    }
}
