<?php

namespace App\Interfaces\Services;

use App\DTO\OrderDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface OrderServiceInterface extends ServiceInterface
{
    public function getByCustomerId(int $customerId): Model|Collection|Builder|array|null;

    public function create(OrderDTO $dto): Model|Builder;

    public function update(int $id, OrderDTO $dto): Model|Collection|Builder|array|null;
}
