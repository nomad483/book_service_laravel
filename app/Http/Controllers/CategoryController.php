<?php

namespace App\Http\Controllers;

use App\DTO\CategoryDTO;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Interfaces\Controllers\CategoryControllerInterface;
use App\Services\CategoryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CategoryController extends Controller implements CategoryControllerInterface
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): AnonymousResourceCollection
    {
        $categories = $this->categoryService->getAll();

        return CategoryResource::collection($categories);
    }

    public function store(CategoryRequest $request): CategoryResource
    {
        $category = $this->categoryService->create(new CategoryDTO(category_name: $request->validated('category_name')));

        return new CategoryResource($category);
    }

    public function show(int $id): CategoryResource
    {
        $category = $this->categoryService->getById($id);

        return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, int $id): CategoryResource
    {
        $category = $this->categoryService->update($id, new CategoryDTO(category_name: $request->validated('category_name')));

        return new CategoryResource($category);
    }

    public function destroy(int $id): Response
    {
        $this->categoryService->delete($id);

        return response()->noContent();
    }
}
