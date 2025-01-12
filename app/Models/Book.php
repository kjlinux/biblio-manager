<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = [
        'isbn',
        'titre',
        'langue',
        'prix',
        'classification_id',
        'edition_id'
    ];

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class)->withPivot('id_cl', 'id_book', 'date_emprunt', 'date_depot');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'author_book', 'id_book', 'id_aut')
            ->withPivot('id_book', 'id_aut');
    }

    public function providers(): BelongsToMany
    {
        return $this->belongsToMany(Provider::class)->withPivot('id_book', 'id_four', 'date_achat', 'quantite');
    }

    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class);
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }
}
