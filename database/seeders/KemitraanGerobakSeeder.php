<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KemitraanGerobakSeeder extends Seeder
{
    public function run()
    {
        $benefits = [
            'Dicarikan Lokasi Strategis. Lokasi usaha sangat mempengaruhi omzet penjualan',
            'Gratis Desain dan Renovasi Tempat Usaha. Layout dan dekorasi menarik dengan konsep Mini Resto',
            'Peralatan Lengkap dan Berkualitas. Semua peralatan untuk operasional Mini Resto',
            'Bahan Baku Awal. Stok bahan baku awal untuk memulai usaha',
            'Dicarikan Karyawan dan Diberikan Pelatihan. Karyawan yang berpengalaman namun tetap diberikan pembekalan/pelatihan exclusive',
            'Dukungan Pemasaran. Free acara Grand Opening dan memaksimalkan dengan digital marketing',
            'Sistem Kemitraan Autopilot. Mitra sebagai investor, management Si Kriuk sebagai pengelola operasional store. Sharing profit investor 70% (sebelum balik modal)',
            'Tanpa Perpanjang Lisensi Kemitraan. Gratis lisensi brand Si Kriuk selama masih bekerjasama'
        ];

        foreach ([1, 2, 3] as $kemitraan_id) {
            foreach ($benefits as $benefit) {
                DB::table('benefit_kemitraans')->insert([
                    'benefit' => $benefit,
                    'kemitraan_id' => $kemitraan_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
