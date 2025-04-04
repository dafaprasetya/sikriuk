<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepKemitraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor',
        'nama',
        'gambar',
    ];
}
