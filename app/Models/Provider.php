<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Provider extends Model
{
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class)->withPivot('id_book','id_four','date_achat','quantite');
    }
}
