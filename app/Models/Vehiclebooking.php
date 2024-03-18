<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehiclebooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'staffid',
        'start_date',
        'start_event_date', 
        'end_date', 
        'attachment',
        'destination',
        'progress',
        'user_id',
        'cartype_id',
        'aprroval_id',
        'driver_id',
    ];

    public function passengers(): HasMany
    {
        return $this->hasMany(Passenger::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cartype(): BelongsTo
    {
        return $this->belongsTo(Cartype::class);
    }

    public function approval(): BelongsTo    
    {
        return $this->belongsTo(Approval::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }





}

