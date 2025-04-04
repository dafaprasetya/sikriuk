<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeunggulanSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keunggulan_mitras')->insert([
            [
                'nomor' => 1,
                'nama' => 'PRODUK SUDAH TERVALIDASI LAKU',
                'deskripsi' => 'LAKU Produk Si Kriuk unggul dari sisi harga yang lebih terjangkau (dan masih untung) namun menawarkan rasa yang setara dengan brand fried chicken international.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 2,
                'nama' => 'LOKASI USAHA DICARIKAN',
                'deskripsi' => 'Tim kami bisa membantu proses pencarian, survey dan negosiasi lokasi usaha Anda.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 3,
                'nama' => 'SUPPORT MANAJEMEN',
                'deskripsi' => 'Mendapatkan dukungan penuh dari tim Pusat Si Kriuk baik untuk kebutuhan strategis maupun teknis.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 4,
                'nama' => 'SOP LENGKAP PLUS BUSINESS SUPPORT',
                'deskripsi' => 'Sistem sudah tersedia, tinggal diikuti langkahnya. Tersedia juga konsultasi bisnis agar outlet Anda makin berkembang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 5,
                'nama' => 'SUPPLY BAHAN BAKU TERJAMIN',
                'deskripsi' => 'Terjamin ketersediaannya, kualitasnya dan harganya. Kami bekerja sama dengan rekan bisnis yang sudah tersertifikasi Halal dan NKV.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor' => 6,
                'nama' => 'MARKETING SUPPORT',
                'deskripsi' => 'Materi promosi, pendaftaran aplikasi layanan antar, hingga dibantu promosi dari tim Pusat Si Kriuk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
