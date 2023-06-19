<?php

namespace App\Http\Controllers;

use App\DTO\AuthorDTO;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Interfaces\AuthorControllerInterface;
use App\Services\AuthorService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class AuthorController extends Controller implements AuthorControllerInterface
{
    private AuthorService $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index(): AnonymousResourceCollection
    {
        $authors = $this->authorService->getAllAuthors();

        return AuthorResource::collection($authors);
    }

    public function store(AuthorRequest $request): AuthorResource
    {
        $author = $this->authorService->createAuthor(
            new AuthorDTO(name: $request->validated('name'), bio: $request->validated('bio')),
        );

        return new AuthorResource($author);
    }

    public function show(int $id): AuthorResource
    {
        $author = $this->authorService->getAuthorById($id);

        return new AuthorResource($author);
    }

    public function update(AuthorRequest $request, int $id): AuthorResource
    {
        $author = $this->authorService->updateAuthor($id, new AuthorDTO(
            name: $request->validated('name'),
            bio: $request->validated('bio')
        ));

        return new AuthorResource($author);
    }

    public function destroy(int $id): Response
    {
        $this->authorService->deleteAuthor($id);

        return response()->noContent();
    }
}
