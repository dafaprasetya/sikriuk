<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamOperasional extends Model
{
    use HasFactory;
    public function about() {
        return $this->belongsTo(About::class);
    }
    protected $fillable = [
        'hari',
        'jam_buka',
    ];
}
