<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jawatan2 extends Model
{
    use HasFactory;

    protected $connection = 'mysql_2';
    protected $table = 'jawatan';
    protected $primaryKey = 'kod_jawatan';

    protected $fillable = ['kod_jawatan', 'info_jawatan'];

    public function staff(): HasOne
    {
        return $this->hasOne(Staff::class);
    }
    
}
