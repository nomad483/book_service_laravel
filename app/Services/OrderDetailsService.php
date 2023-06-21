<?php

namespace App\Services;

use App\DTO\OrderDetailsDTO;
use App\Interfaces\Services\OrderDetailsServiceInterface;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderDetailsService implements OrderDetailsServiceInterface
{
    public function getByOrderId(int $orderId): Model|Collection|Builder|array|null
    {
        return OrderDetail::query()->findOrFail($orderId, 'order_id');
    }

    public function getByBookId(int $bookId): Model|Collection|Builder|array|null
    {
        return OrderDetail::query()->findOrFail($bookId, 'book_id');
    }

    public function create(OrderDetailsDTO $dto): Model|Builder
    {
        return OrderDetail::query()->create((array) $dto);
    }

    public function update(int $id, OrderDetailsDTO $dto): Model|Collection|Builder|array|null
    {
        $orderDetail = OrderDetail::query()->findOrFail($id);
        $orderDetail->update((array) $dto);

        return $orderDetail;
    }

    public function getAll(): Collection
    {
        return OrderDetail::all();
    }

    public function getById(int $id): Model|Collection|Builder|array|null
    {
        return OrderDetail::query()->findOrFail($id);
    }

    public function delete(int $id): bool|null
    {
        return OrderDetail::query()->findOrFail($id)->delete();
    }
}
