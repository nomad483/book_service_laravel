<?php

namespace App\Http\Controllers;

use App\DTO\CustomerDTO;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Interfaces\Controllers\CustomerControllerInterface;
use App\Services\CustomerService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CustomerController extends Controller implements CustomerControllerInterface
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(): AnonymousResourceCollection
    {
        $customers = $this->customerService->getAll();

        return CustomerResource::collection($customers);
    }

    public function store(CustomerRequest $request): CustomerResource
    {
        $customer = $this->customerService->create(
            new CustomerDTO(
                name: $request->validated('name'),
                email: $request->validated('email'),
                address: $request->validated('address'),
                user_id: $request->validated('user_id')
            )
        );

        return new CustomerResource($customer);
    }

    public function show(int $id): CustomerResource
    {
        $customer = $this->customerService->getById($id);

        return new CustomerResource($customer);
    }

    public function showByUser(int $userId): AnonymousResourceCollection
    {
        $customers = $this->customerService->getByUserId($userId);

        return CustomerResource::collection($customers);
    }

    public function update(CustomerRequest $request, int $id): CustomerResource
    {
        $customer = $this->customerService->update($id,
            new CustomerDTO(
                name: $request->validated('name'),
                email: $request->validated('email'),
                address: $request->validated('address'),
                user_id: $request->validated('user_id')
            )
        );

        return new CustomerResource($customer);
    }

    public function destroy(int $id): Response
    {
        $this->customerService->delete($id);

        return response()->noContent();
    }
}
