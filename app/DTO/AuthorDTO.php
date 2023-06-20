<?php

namespace App\DTO;

readonly class AuthorDTO
{
    public function __construct(
        public string $name,
        public string $bio
    ) {
    }
}
