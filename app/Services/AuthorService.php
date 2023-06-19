<?php

namespace App\Services;

use App\DTO\AuthorDTO;
use App\Models\Author;
use \App\Interfaces\AuthorServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AuthorService implements AuthorServiceInterface
{

    public function getAllAuthors(): Collection
    {
        return Author::all();
    }

    public function getAuthorById(int $id): Model|Collection|Builder|array|null
    {
        return Author::query()->findOrFail($id);
    }

    public function createAuthor(AuthorDTO $dto): Model|Builder
    {
        return Author::query()->create((array)$dto);
    }

    public function updateAuthor(int $id, AuthorDTO $dto): Model|Collection|Builder|array|null
    {
        $author = Author::query()->findOrFail($id);
        $author->update((array)$dto);
        return $author;
    }
    public function deleteAuthor(int $id): void
    {
        Author::query()->findOrFail($id)->delete();
    }
}
