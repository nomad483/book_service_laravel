<?php

namespace App\Interfaces\Controllers;

use App\Http\Requests\OrderDetailsRequest;
use App\Http\Resources\OrderDetailsResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

interface OrderDetailsControllerInterface
{
    public function index(): AnonymousResourceCollection;

    public function store(OrderDetailsRequest $request): OrderDetailsResource;

    public function show(int $id): OrderDetailsResource;

    public function showByOrder(int $orderId): AnonymousResourceCollection;

    public function showByBook(int $bookId): AnonymousResourceCollection;

    public function update(OrderDetailsRequest $request, int $id): OrderDetailsResource;

    public function destroy(int $id): Response;
}
