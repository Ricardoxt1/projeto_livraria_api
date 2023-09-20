<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['author_id', 'publisher_id', 'library_id', 'titule', 'page', 'realese_date'];

    /**
     * Retrieve the author of this book.
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Retrieve the publisher of this book.
     * @return BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * Retrieve the library where this book is located.
     * @return BelongsTo
     */
    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
