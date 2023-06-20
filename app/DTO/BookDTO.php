<?php

namespace App\DTO;

readonly class BookDTO
{
    public function __construct(
        public string $title,
        public int $author_id,
        public string|null $images,
        public string|null $small_image,
        public string $publication_date,
        public float $price,
        public int $quantity_available
    ) {
    }
}
