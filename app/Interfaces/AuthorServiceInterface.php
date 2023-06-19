<?php

namespace App\Interfaces;

use App\DTO\AuthorDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AuthorServiceInterface
{
    public function getAllAuthors(): Collection;
    public function getAuthorById(int $id): Model|Collection|Builder|array|null;
    public function createAuthor(AuthorDTO $dto): Model|Builder;
    public function updateAuthor(int $id, AuthorDTO $dto): Model|Collection|Builder|array|null;
    public function deleteAuthor(int $id): void;
}
