<?php

namespace App\Interfaces;

use App\DTO\AuthorDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AuthorServiceInterface extends ServiceInterface
{
    public function create(AuthorDTO $dto): Model|Builder;

    public function update(int $id, AuthorDTO $dto): Model|Collection|Builder|array|null;
}
