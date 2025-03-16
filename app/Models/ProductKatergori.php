<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKatergori extends Model
{
    use HasFactory;
    public function barang() {
        return $this->hasMany(Product::class, 'kategori_id');
    }
}
