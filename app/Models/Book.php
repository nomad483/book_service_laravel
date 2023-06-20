<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'title',
        'images',
        'small_image',
        'publication_date',
        'author_id',
        'price',
        'quantity_available',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'books_categories', 'book_id', 'category_id');
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'book_id');
    }
}
