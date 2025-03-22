<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemitraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'harga',
    ];
    public function benefit() {
        return $this->hasMany(BenefitKemitraan::class, 'kemitraan_id');
    }
}
