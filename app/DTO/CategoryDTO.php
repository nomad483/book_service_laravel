<?php

namespace App\DTO;

class CategoryDTO extends BaseDTO
{
    public function __construct(readonly public string $category_name)
    {
    }
}
