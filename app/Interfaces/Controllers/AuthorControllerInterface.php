<?php

namespace App\Interfaces\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

interface AuthorControllerInterface
{
    public function index(): AnonymousResourceCollection;

    public function store(AuthorRequest $request): AuthorResource;

    public function show(int $id): AuthorResource;

    public function update(AuthorRequest $request, int $id): AuthorResource;

    public function destroy(int $id): Response;
}
