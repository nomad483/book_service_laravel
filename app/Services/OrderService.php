<?php

namespace App\Services;

use App\DTO\OrderDTO;
use App\Interfaces\Services\OrderServiceInterface;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderService implements OrderServiceInterface
{
    public function getByCustomerId(int $customerId): Model|Collection|Builder|array|null
    {
        return Order::query()->findOrFail($customerId, 'customer_id');
    }

    public function create(OrderDTO $dto): Model|Builder
    {
        return Order::query()->create((array) $dto);
    }

    public function update(int $id, OrderDTO $dto): Model|Collection|Builder|array|null
    {
        $order = Order::query()->findOrFail($id);
        $order->update((array) $dto);

        return $order;
    }

    public function getAll(): Collection
    {
        return Order::all();
    }

    public function getById(int $id): Model|Collection|Builder|array|null
    {
        return Order::query()->findOrFail($id);
    }

    public function delete(int $id): bool|null
    {
        return Order::query()->findOrFail($id)->delete();
    }
}
