<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function handphone()
    {
        return $this->hasMany(handphone::class);
    }
}
