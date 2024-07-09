<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
                'nama' => 'Undangan',
                'keterangan' => 'Surat undangan'
            ],
            [
                'nama' => 'Pengumuman',
                'keterangan' => 'Surat pengumuman'
            ],
            [
                'nama' => 'Nota Dinas',
                'keterangan' => 'Surat nota dinas'
            ],
            [
                'nama' => 'Pemberitahuan',
                'keterangan' => 'Surat pemberitahuan'
            ],
        ]);
    }
}
