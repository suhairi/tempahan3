<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Staff extends Model
{
    use HasFactory;

    protected $connection = 'mysql_2';
    protected $table = 'staff';
    protected $primaryKey = 'staff_id';

    protected $fillable = [
        'staff_id', 'nama', 'no_kp', 'no_tel',
        'kod_jantina', 'kod_bangsa', 'kod_agama', 
        'tarikh_masuk', 'tarikh_sah', 'tarikh_gred_semasa', 'tarikh_penempatan_semasa',
        'tarikh_dinaikkan_pangkat', 'tarikh_pencen',
        'kod_jawatan_semasa', 'kod_gred_semasa', 'kod_bhgn_semasa', 'kod_caw_semasa', 'kod_seksyen_semasa',
        'gaji_pokok', 'bulan_naik_gaji', 'status_code',
        'umur_semasa', 'catatan',
        'user_level', 'speed_dial', 'connection',
        'staff_location', 'kod_gelaran_semasa'
    ];

    public function jawatan(): BelongsTo
    {
        return $this->belongsTo(Jawatan::class, 'kod_jawatan_semasa');
    }

    public function gred(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'kod_jawatan_semasa');
    }

    public function passenger(): HasMany
    {
        return $this->hasMany(Passenger::class);
    }

    public function vehiclebooking(): HasOne
    {
        return $this->hasOne(Vehiclebooking::class);
    }

    public function bahagian(): BelongsTo
    {
        return $this->belongsTo(Bahagian2::class, 'kod_bhgn_semasa');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

}
