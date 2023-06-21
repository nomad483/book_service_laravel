<?php

namespace App\DTO;

abstract class BaseDTO
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public static function fromArray()
    {

    }
}
