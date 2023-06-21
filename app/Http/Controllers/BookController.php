<?php

namespace App\Http\Controllers;

use App\DTO\BookDTO;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Interfaces\Controllers\BookControllerInterface;
use App\Services\BookService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BookController extends Controller implements BookControllerInterface
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(): AnonymousResourceCollection
    {
        $books = $this->bookService->getAll();

        return BookResource::collection($books);
    }

    public function store(BookRequest $request): BookResource
    {
        $book = $this->bookService->create(
            new BookDTO(
                title: $request->validated('title'),
                author_id: $request->validated('author_id'),
                images: $request->validated('images'),
                small_image: $request->validated('small_image'),
                publication_date: $request->validated('publication_date'),
                price: $request->validated('price'),
                quantity_available: $request->validated('quantity_available')
            ),
        );

        return new BookResource($book);
    }

    public function show(int $id): BookResource
    {
        $book = $this->bookService->getById($id);

        return new BookResource($book);
    }

    public function showByAuthor(int $authorId): AnonymousResourceCollection
    {
        $books = $this->bookService->getByAuthor($authorId);

        return BookResource::collection($books);
    }

    public function update(BookRequest $request, int $id): BookResource
    {
        $book = $this->bookService->update(
            $id,
            new BookDTO(
                title: $request->validated('title'),
                author_id: $request->validated('author_id'),
                images: $request->validated('images'),
                small_image: $request->validated('small_image'),
                publication_date: $request->validated('publication_date'),
                price: $request->validated('price'),
                quantity_available: $request->validated('quantity_available')
            ),
        );

        return new BookResource($book);
    }

    public function destroy(int $id): Response
    {
        $this->bookService->delete($id);

        return response()->noContent();
    }
}
