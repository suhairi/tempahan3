<?php

namespace App\Models;

// use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Driver extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['name', 'slug', 'staffid', 'email', 'phone', 'type', 'bahagian_id'];

    public function bahagian(): BelongsTo
    {
        return $this->belongsTo(Bahagian::class);
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    public function name(): Attribute
    {
        get: fn($value) => strtoupper($value);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'staffid');
    }
}
