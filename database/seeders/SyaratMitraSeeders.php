<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SyaratMitraSeeders extends Seeder
{
    public function run()
    {
        DB::table('syarat_mitras')->insert([
            [
                'nomor' => 1,
                'nama' => 'Modal Awal',
                'deskripsi' => 'Memiliki modal yang cukup untuk investasi awal sesuai dengan paket waralaba yang dipilih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 2,
                'nama' => 'Lokasi Strategis',
                'deskripsi' => 'Menyediakan lokasi usaha yang strategis dan mudah diakses oleh pelanggan, seperti di pusat keramaian, dekat sekolah, atau area perkantoran.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 3,
                'nama' => 'Komitmen dan Dedikasi',
                'deskripsi' => 'Bersedia menginvestasikan waktu dan usaha untuk menjalankan bisnis serta berkomitmen terhadap standar operasional yang ditetapkan oleh Si Kriuk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 4,
                'nama' => 'Pelatihan',
                'deskripsi' => 'Siap mengikuti pelatihan yang diberikan oleh pihak franchisor untuk memahami proses operasional, penyajian, dan manajemen.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 5,
                'nama' => 'Kepatuhan pada Brand',
                'deskripsi' => 'Bersedia mematuhi pedoman branding dan pemasaran yang ditetapkan untuk menjaga konsistensi dan reputasi merek.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 6,
                'nama' => 'Kemampuan Manajerial',
                'deskripsi' => 'Memiliki kemampuan dalam manajemen dan pengelolaan sumber daya manusia, termasuk dalam merekrut dan melatih karyawan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 7,
                'nama' => 'Kesiapan Teknologi',
                'deskripsi' => 'Memiliki akses ke teknologi yang diperlukan untuk mendukung operasional, seperti sistem kasir dan perangkat lunak manajemen.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 8,
                'nama' => 'Minat di Bidang Kuliner',
                'deskripsi' => 'Memiliki minat dan pengetahuan tentang industri makanan dan minuman, khususnya ayam goreng.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
