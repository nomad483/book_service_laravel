<?php

namespace App\Interfaces\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

interface BookControllerInterface
{
    public function index(): AnonymousResourceCollection;

    public function store(BookRequest $request): BookResource;

    public function show(int $id): BookResource;

    public function showByAuthor(int $authorId): AnonymousResourceCollection;

    public function update(BookRequest $request, int $id): BookResource;

    public function destroy(int $id): Response;
}
