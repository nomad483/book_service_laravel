<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'books_categories', 'category_id', 'book_id');
    }
}
