<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'staffid', 'vehiclebooking_id'];

    public function vehiclebooking(): BelongsTo
    {
        return $this->belongsTo(Vehiclebooking::class);
    }
}
