<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    protected $connection = 'mysql_2';
    protected $table = 'gred';
    protected $primaryKey = 'kod_gred';

    protected $fillable = ['kod_gred', 'info_gred', 'kod_jawatan', 'kod_kump'];

 
}
