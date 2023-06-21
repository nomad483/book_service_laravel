<?php

namespace App\Interfaces\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

interface CustomerControllerInterface
{
    public function index(): AnonymousResourceCollection;

    public function store(CustomerRequest $request): CustomerResource;

    public function show(int $id): CustomerResource;

    public function showByUser(int $userId): AnonymousResourceCollection;

    public function update(CustomerRequest $request, int $id): CustomerResource;

    public function destroy(int $id): Response;
}
