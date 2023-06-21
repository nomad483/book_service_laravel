<?php

namespace App\Http\Controllers;

use App\DTO\OrderDTO;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Interfaces\Controllers\OrderControllerInterface;
use App\Services\OrderService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class OrderController extends Controller implements OrderControllerInterface
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(): AnonymousResourceCollection
    {
        $orders = $this->orderService->getAll();

        return OrderResource::collection($orders);
    }

    public function store(OrderRequest $request): OrderResource
    {
        $order = $this->orderService->create(
            new OrderDTO(
                customer_id: $request->validated('customer_id'),
                date: $request->validated('date'),
                total_amount: $request->validated('total_amount')
            )
        );

        return new OrderResource($order);
    }

    public function show(int $id): OrderResource
    {
        $order = $this->orderService->getById($id);

        return new OrderResource($order);
    }

    public function showByCustomer(int $customerId): AnonymousResourceCollection
    {
        $orders = $this->orderService->getByCustomerId($customerId);

        return OrderResource::collection($orders);
    }

    public function update(OrderRequest $request, int $id): OrderResource
    {
        $order = $this->orderService->update($id,
            new OrderDTO(
                customer_id: $request->validated('customer_id'),
                date: $request->validated('date'),
                total_amount: $request->validated('total_amount')
            )
        );

        return new OrderResource($order);
    }

    public function destroy(int $id): Response
    {
        $this->orderService->delete($id);

        return response()->noContent();
    }
}
