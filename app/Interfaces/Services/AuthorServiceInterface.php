<?php

namespace App\Interfaces\Services;

use App\DTO\AuthorDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AuthorServiceInterface extends ServiceInterface
{
    public function create(AuthorDTO $dto);

    public function update(int $id, AuthorDTO $dto): Model|Collection|Builder|array|null;
}
