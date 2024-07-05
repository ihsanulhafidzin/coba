<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Handphone extends Model
{
    // Define the table associated with the model
    protected $table = 'handphone';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'merek',
        'warna',
        'ram',
        'harga',
        'type',
    ];

    // Define the relationship with the Tipe model
    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'tipe_id');
    }
}
