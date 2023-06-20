<?php

namespace App\Interfaces;

use App\DTO\BookDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BookServiceInterface extends ServiceInterface
{
    public function getByAuthor(int $authorId): Model|Collection|Builder|array|null;

    public function create(BookDTO $dto): Model|Builder;

    public function update(int $id, BookDTO $dto): Model|Collection|Builder|array|null;
}
