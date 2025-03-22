<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitKemitraan extends Model
{
    use HasFactory;
    function kemitraan() {
        return $this->belongsTo(Kemitraan::class, 'kemitraan_id');
    }
}
