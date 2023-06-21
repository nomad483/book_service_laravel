<?php

namespace App\Http\Controllers;

use App\DTO\AuthorDTO;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Interfaces\Controllers\AuthorControllerInterface;
use App\Services\AuthorService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;

class AuthorController extends Controller implements AuthorControllerInterface
{
    private AuthorService $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    #[OA\Response(response: 200, description: 'Return all authors')]
    #[OA\Get(path: '/api/authors')]
    public function index(): AnonymousResourceCollection
    {
        $authors = $this->authorService->getAll();

        return AuthorResource::collection($authors);
    }

    public function store(AuthorRequest $request): AuthorResource
    {
        $author = $this->authorService->create(
            new AuthorDTO(name: $request->validated('name'), bio: $request->validated('bio'))
        );

        return new AuthorResource($author);
    }

    public function show(int $id): AuthorResource
    {
        $author = $this->authorService->getById($id);

        return new AuthorResource($author);
    }

    public function update(AuthorRequest $request, int $id): AuthorResource
    {
        $author = $this->authorService->update($id, new AuthorDTO(
            name: $request->validated('name'),
            bio: $request->validated('bio')
        ));

        return new AuthorResource($author);
    }

    public function destroy(int $id): Response
    {
        $this->authorService->delete($id);

        return response()->noContent();
    }
}
