<?php

namespace App\DTO;

class CustomerDTO extends BaseDTO
{
    public function __construct(
        readonly public string $name,
        readonly public string $email,
        readonly public string $address,
        readonly public int $user_id
    ) {
    }
}
