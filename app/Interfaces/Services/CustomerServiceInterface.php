<?php

namespace App\Interfaces\Services;

use App\DTO\CustomerDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CustomerServiceInterface extends ServiceInterface
{
    public function getByUserId(int $userId): Model|Collection|Builder|array|null;

    public function create(CustomerDTO $dto): Model|Builder;

    public function update(int $id, CustomerDTO $dto): Model|Collection|Builder|array|null;
}
