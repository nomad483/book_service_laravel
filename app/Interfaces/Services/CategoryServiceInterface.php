<?php

namespace App\Interfaces\Services;

use App\DTO\CategoryDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CategoryServiceInterface extends ServiceInterface
{
    public function create(CategoryDTO $dto): Model|Builder;

    public function update(int $id, CategoryDTO $dto): Model|Collection|Builder|array|null;
}
