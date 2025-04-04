<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeunggulanMitra extends Model
{
    use HasFactory;
    protected $fillable=['nomor', 'nama', 'deskripsi'];
}
