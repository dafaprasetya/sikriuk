<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    public function email() {
        return $this->hasMany(EmailAbout::class);
    }
    public function phone() {
        return $this->hasMany(PhoneAbout::class);
    }
    public function sosmed() {
        return $this->hasMany(SosmedAbout::class);
    }
}
