<?php

namespace App\Services;

use App\DTO\CustomerDTO;
use App\Interfaces\Services\CustomerServiceInterface;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CustomerService implements CustomerServiceInterface
{
    public function getByUserId(int $userId): Model|Collection|Builder|array|null
    {
        return Customer::query()->findOrFail($userId, 'user_id');
    }

    public function create(CustomerDTO $dto): Model|Builder
    {
        return Customer::query()->create((array) $dto);
    }

    public function update(int $id, CustomerDTO $dto): Model|Collection|Builder|array|null
    {
        $customer = Customer::query()->findOrFail($id);
        $customer->update((array) $dto);

        return $customer;
    }

    public function getAll(): Collection
    {
        return Customer::all();
    }

    public function getById(int $id): Model|Collection|Builder|array|null
    {
        return Customer::query()->findOrFail($id);
    }

    public function delete(int $id): bool|null
    {
        return Customer::query()->findOrFail($id)->delete();
    }
}
