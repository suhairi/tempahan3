<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carmodel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'carbrand_id', 'cartype_id'];

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    public function cartype(): BelongsTo
    {
        return $this->belongsTo(Cartype::class);
    }

    public function carbrand(): BelongsTo
    {
        return $this->belongsTo(Carbrand::class);
    }

    public function name(): Attribute 
    {
        return Attribute::make(
            set: fn(string $value) => strtoupper($value),
            get: fn(string $value) => strtoupper($value),
        );
    }
}
