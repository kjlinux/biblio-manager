<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    protected $guarded  = [];
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class)->withPivot('id_cl','id_book','date_emprunt','date_depot');
    }
}
