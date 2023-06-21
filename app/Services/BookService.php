<?php

namespace App\Services;

use App\DTO\BookDTO;
use App\Interfaces\Services\BookServiceInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookService implements BookServiceInterface
{
    public function getAll(): Collection
    {
        return Book::all();
    }

    public function getByAuthor(int $authorId): Model|Collection|Builder|array|null
    {
        return Book::query()->findOrFail($authorId, 'author_id');
    }

    public function create(BookDTO $dto): Model|Builder
    {
        return Book::query()->create((array) $dto);
    }

    public function update(int $id, BookDTO $dto): Model|Collection|Builder|array|null
    {
        $book = Book::query()->findOrFail($id);
        $book->update((array) $dto);

        return $book;
    }

    public function getById(int $id): Model|Collection|Builder|array|null
    {
        return Book::query()->findOrFail($id);
    }

    public function delete(int $id): bool|null
    {
        return Book::query()->findOrFail($id)->delete();
    }
}
