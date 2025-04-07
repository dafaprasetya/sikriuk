<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        // Insert ke tabel abouts
        $aboutId = DB::table('abouts')->insertGetId([
            'nama' => 'Sikriuk Fried Chicken',
            'namapt' => 'PT Inti Kriuk Indonesia',
            'logo' => 'default-logo.png', // ganti jika ada logo
            'moto' => 'Juaranya Kriuk!',
            'deskripsi' => 'Pelopor dalam kemitraan bisnis di industri makanan, khususnya fried chicken. Didirikan pada 2024, kami telah membangun jaringan kemitraan yang kuat dengan berbagai mitra bisnis untuk menyediakan hidangan ayam goreng berkualitas tinggi kepada pelanggan di seluruh Indonesia',
            'lokasi' => 'Jl. Villa Randu III No.5, Kedung Jaya, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16164',
            'total_mitra' => '30',
            'followersig' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert ke email_abouts
        DB::table('email_abouts')->insert([
            'about_id' => $aboutId,
            'nama' => 'Email Utama',
            'email' => 'ptintikriukindonesia@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert ke phone_abouts
        DB::table('phone_abouts')->insert([
            'about_id' => $aboutId,
            'nama' => 'Nomor Utama',
            'phone' => '6282123223232',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert ke sosmed_abouts
        DB::table('sosmed_abouts')->insert([
            'about_id' => $aboutId,
            'nama' => 'Instagram',
            'logo' => 'fab fa-instagram', // class Font Awesome
            'links' => 'https://instagram.com/sikriukkrispy',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
