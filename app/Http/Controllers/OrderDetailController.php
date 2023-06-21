<?php

namespace App\Http\Controllers;

use App\DTO\OrderDetailsDTO;
use App\Http\Requests\OrderDetailsRequest;
use App\Http\Resources\OrderDetailsResource;
use App\Interfaces\Controllers\OrderDetailsControllerInterface;
use App\Services\OrderDetailsService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class OrderDetailController extends Controller implements OrderDetailsControllerInterface
{
    private OrderDetailsService $orderDetailsService;

    public function __construct(OrderDetailsService $orderDetailsService)
    {
        $this->orderDetailsService = $orderDetailsService;
    }

    public function index(): AnonymousResourceCollection
    {
        $orderDetails = $this->orderDetailsService->getAll();

        return OrderDetailsResource::collection($orderDetails);
    }

    public function store(OrderDetailsRequest $request): OrderDetailsResource
    {
        $orderDetail = $this->orderDetailsService->create(
            new OrderDetailsDTO(
                order_id: $request->validated('order_id'),
                book_id: $request->validated('book_id'),
                quantity: $request->validated('quantity'),
                price_per_unit: $request->validated('price_per_unit')
            )
        );

        return new OrderDetailsResource($orderDetail);
    }

    public function show(int $id): OrderDetailsResource
    {
        $orderDetail = $this->orderDetailsService->getById($id);

        return new OrderDetailsResource($orderDetail);
    }

    public function showByOrder(int $orderId): AnonymousResourceCollection
    {
        $orderDetails = $this->orderDetailsService->getByOrderId($orderId);

        return OrderDetailsResource::collection($orderDetails);
    }

    public function showByBook(int $bookId): AnonymousResourceCollection
    {
        $orderDetails = $this->orderDetailsService->getByBookId($bookId);

        return OrderDetailsResource::collection($orderDetails);
    }

    public function update(OrderDetailsRequest $request, int $id): OrderDetailsResource
    {
        $orderDetail = $this->orderDetailsService->update($id,
            new OrderDetailsDTO(
                order_id: $request->validated('order_id'),
                book_id: $request->validated('book_id'),
                quantity: $request->validated('quantity'),
                price_per_unit: $request->validated('price_per_unit')
            )
        );

        return new OrderDetailsResource($orderDetail);
    }

    public function destroy(int $id): Response
    {
        $this->orderDetailsService->delete($id);

        return response()->noContent();
    }
}
