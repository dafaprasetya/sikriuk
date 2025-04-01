<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKatergori extends Model
{
    use HasFactory;
    public function product() {
        return $this->hasMany(Product::class, 'product_kategori_id');
    }
}
