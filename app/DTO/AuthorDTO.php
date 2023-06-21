<?php

namespace App\DTO;

class AuthorDTO extends BaseDTO
{
    public function __construct(
        readonly public string $name,
        readonly public string $bio
    ) {
    }
}
