<?php

namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ServiceInterface
{
    public function getAll(): Collection;

    public function getById(int $id): Model|Collection|Builder|array|null;

    public function delete(int $id): bool|null;
}
