<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JamOpSeeder extends Seeder
{
    public function run(): void
    {
        $hariList = [
            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'
        ];

        foreach ($hariList as $hari) {
            DB::table('jam_operasionals')->insert([
                'about_id' => 1,
                'hari' => $hari,
                'jam_buka' => $hari === 'Minggu' ? 'Libur' : '08:00 - 22:00',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
