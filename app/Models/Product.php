<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_kategori_id',
        'nama',
        'harga',
        'deskripsi',
        'gambar',
    ];
    function kategori() {
        return $this->belongsTo(ProductKatergori::class, 'product_kategori_id');
    }
}
