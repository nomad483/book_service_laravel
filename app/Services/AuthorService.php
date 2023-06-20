<?php

namespace App\Services;

use App\DTO\AuthorDTO;
use App\Interfaces\AuthorServiceInterface;
use App\Models\Author;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AuthorService implements AuthorServiceInterface
{
    public function getAll(): Collection
    {
        return Author::all();
    }

    public function getById(int $id): Model|Collection|Builder|array|null
    {
        return Author::query()->findOrFail($id);
    }

    public function create(AuthorDTO $dto): Model|Builder
    {
        return Author::query()->create((array) $dto);
    }

    public function update(int $id, AuthorDTO $dto): Model|Collection|Builder|array|null
    {
        $author = Author::query()->findOrFail($id);
        $author->update((array) $dto);

        return $author;
    }

    public function delete(int $id): bool|null
    {
        Author::query()->findOrFail($id)->delete();
    }
}
