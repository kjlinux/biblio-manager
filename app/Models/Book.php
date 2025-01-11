<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class)->withPivot('id_cl','id_book','date_emprunt','date_depot');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class)->withPivot('id_book', 'id_aut');
    }

    public function providers(): BelongsToMany
    {
        return $this->belongsToMany(Provider::class)->withPivot('id_book','id_four','date_achat','quantite');
    }

    public function classifications(): HasMany
    {
        return $this->hasMany(Classification::class);
    }

    public function editions(): HasMany
    {
        return $this->hasMany(Edition::class);
    }
}
