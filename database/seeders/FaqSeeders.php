<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeders extends Seeder
{
    public function run()
    {
        DB::table('faqs')->insert([
            [
                'tanya' => 'Seperti apa sistem kemitraan Si Kriuk itu?',
                'jawab' => 'Si Kriuk Kemitraan Si Kriuk adalah sistem kemitraan jual beli putus dimana 100% keuntungan outlet untuk Mitra Si Kriuk tanpa bagi hasil dan biaya royalti.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanya' => 'Bahan Bakunya Apakah Disediakan?',
                'jawab' => 'Untuk menjaga standar kualitas rasa dan branding yang baik, bahan baku utama seperti ayam frozen, tepung, saus branding, packaging, dan lain-lain sudah disediakan dan wajib beli ke Si Kriuk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanya' => 'Bolehkah Membeli Bahan Baku Diluar?',
                'jawab' => 'Tidak boleh, kecuali isi gas, minyak, dan beras. Membeli bahan baku dari pihak luar berarti melanggar kesepakatan kemitraan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanya' => 'Apakah Ada Pelatihan untuk karyawan?',
                'jawab' => 'Ada, pelatihannya bisa di training center kami secara gratis atau mendatangkan trainer kami secara ke lokasi outlet khusus untuk wilayah yang belum ada training center terdekat tentunya dengan biaya tambahan. Untuk pelatihannya kurang lebih sepekan atau minimal 2 hari.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanya' => 'Untuk promosi outlet apakah disupport penuh oleh Si Kriuk?',
                'jawab' => 'Si Kriuk Pusat akan menyediakan dan mengupdate marketing kit yang dapat digunakan oleh Mitra untuk mempromosikan. Ada juga program bantuan promosi untuk tiap Mitra yang diadakan secara reguler maupun event tertentu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanya' => 'Apakah boleh menentukan harga jual sendiri?',
                'jawab' => 'Tidak boleh. Untuk harga jual harus mengikuti kebijakan dari Manajemen Si Kriuk Fried Chicken. Apabila Mitra memiliki inisiatif program promo yang mengurangi harga jual, wajib memberi tahu dan mendapatkan persetujuan manajemen Si Kriuk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanya' => 'Apakah Bisa Dicarikan Lokasinya?',
                'jawab' => 'Bisa, akan kami arahkan, tetapi kami tidak dapat menjamin pada pangsa pasar, tingkat kepadatan penduduk dan daya beli masyarakatnya, karena harus ada analisa lebih lanjut.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
