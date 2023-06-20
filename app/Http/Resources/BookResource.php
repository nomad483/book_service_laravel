<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'small_image' => $this->small_image,
            'images' => $this->images,
            'publication_date' => $this->publication_date,
            'author_id' => $this->author_id,
            'price' => $this->price,
            'quantity_available' => $this->quantity_available,
            'author' => 'todo: add this author',
        ];
    }
}
