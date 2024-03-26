<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'staffid', 'vehiclebooking_id'];

    public function vehiclebooking(): HasOne
    {
        return $this->hasOne(Vehiclebooking::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'staffid', 'staff_id');
    }
}
