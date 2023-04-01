<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            'nama' => 'Ani',
            'nomor_induk' => '1001',
            'alamat' => 'Bantul',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'nama' => 'Budi',
            'nomor_induk' => '1002',
            'alamat' => 'Gunung Kidul',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'nama' => 'Candra',
            'nomor_induk' => '1003',
            'alamat' => 'Sleman',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
