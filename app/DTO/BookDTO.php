<?php

namespace App\DTO;

class BookDTO extends BaseDto
{
    public function __construct(
        readonly public string $title,
        readonly public int $author_id,
        readonly public string|null $images,
        readonly public string|null $small_image,
        readonly public string $publication_date,
        readonly public float $price,
        readonly public int $quantity_available
    ) {
    }
}
