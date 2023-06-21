<?php

namespace App\Interfaces\Services;

use App\DTO\OrderDetailsDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface OrderDetailsServiceInterface extends ServiceInterface
{
    public function getByOrderId(int $orderId): Model|Collection|Builder|array|null;

    public function getByBookId(int $bookId): Model|Collection|Builder|array|null;

    public function create(OrderDetailsDTO $dto): Model|Builder;

    public function update(int $id, OrderDetailsDTO $dto): Model|Collection|Builder|array|null;
}
