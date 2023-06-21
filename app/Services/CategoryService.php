<?php

namespace App\Services;

use App\DTO\CategoryDTO;
use App\Interfaces\Services\CategoryServiceInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryService implements CategoryServiceInterface
{
    public function create(CategoryDTO $dto): Model|Builder
    {
        return Category::query()->create((array) $dto);
    }

    public function update(int $id, CategoryDTO $dto): Model|Collection|Builder|array|null
    {
        $category = Category::query()->findOrFail($id);
        $category->update((array) $dto);

        return $category;
    }

    public function getAll(): Collection
    {
        return Category::all();
    }

    public function getById(int $id): Model|Collection|Builder|array|null
    {
        return Category::query()->findOrFail($id);
    }

    public function delete(int $id): bool|null
    {
        return Category::query()->findOrFail($id)->delete();
    }
}
