<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'author_book', 'id_aut', 'id_book')->withPivot('id_book', 'id_aut');
    }
}
