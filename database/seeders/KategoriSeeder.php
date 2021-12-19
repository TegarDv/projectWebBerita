<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = [
            ['kategori_name' => 'Politik',],
            ['kategori_name' => 'Digital',],
            ['kategori_name' => 'Prestasi',],
            ['kategori_name' => 'Kuliner',],
            ['kategori_name' => 'Sport',],
            ['kategori_name' => 'Kesehatan',],
        ];

        DB::table('kategori')->insert($class);

    }
}
