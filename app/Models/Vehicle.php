<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['plateno', 'location', 'driver_id', 'carmodel_id'];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function carmodel(): BelongsTo
    {
        return $this->belongsTo(Carmodel::class);
    }
}
