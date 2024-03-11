<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bahagian extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'singkatan'];

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class);
    }
}
