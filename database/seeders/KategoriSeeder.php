<?php

namespace Database\Seeders; // <-- PASTIKAN INI BENAR

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori; // <-- PASTIKAN BARIS INI ADA DAN BENAR

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create(['nama_kategori' => 'Undangan', 'keterangan' => 'Surat undangan rapat, koordinasi, dlsb.']);
        Kategori::create(['nama_kategori' => 'Pengumuman', 'keterangan' => 'Surat-surat yang terkait dengan pengumuman.']);
        Kategori::create(['nama_kategori' => 'Nota Dinas', 'keterangan' => 'Nota dinas internal antar bagian.']);
        Kategori::create(['nama_kategori' => 'Pemberitahuan', 'keterangan' => 'Surat yang sifatnya memberitahukan suatu perihal.']);
    }
}