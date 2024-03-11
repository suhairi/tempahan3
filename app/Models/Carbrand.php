<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Carbrand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function carmodel(): HasOne
    {
        return $this->hasOne(Carmodel::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => strtoupper($value),
            get: fn(string $value) => strtoupper($value),
        );
    }
}
