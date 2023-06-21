<?php

namespace App\Interfaces\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

interface CategoryControllerInterface
{
    public function index(): AnonymousResourceCollection;

    public function store(CategoryRequest $request): CategoryResource;

    public function show(int $id): CategoryResource;

    public function update(CategoryRequest $request, int $id): CategoryResource;

    public function destroy(int $id): Response;
}
