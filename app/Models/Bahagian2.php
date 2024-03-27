<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bahagian2 extends Model
{
    use HasFactory;

    protected $connection = 'mysql_2';
    protected $table = 'bahagian';
    protected $primaryKey = 'kod_bhgn';

    protected $fillable = ['kod_bghn', 'info_bhgn', 'singkatan'];

    public function staff(): HasOne
    {
        return $this->hasOne(Staff::class);
    }
}
