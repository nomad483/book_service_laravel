<?php

namespace App\Interfaces\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

interface OrderControllerInterface
{
    public function index(): AnonymousResourceCollection;

    public function store(OrderRequest $request): OrderResource;

    public function show(int $id): OrderResource;

    public function showByCustomer(int $customerId): AnonymousResourceCollection;

    public function update(OrderRequest $request, int $id): OrderResource;

    public function destroy(int $id): Response;
}
