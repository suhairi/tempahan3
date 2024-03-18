<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status'];

    public function vehiclebooking(): HasOne
    {
        return $this->hasOne(Vehiclebooking::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
