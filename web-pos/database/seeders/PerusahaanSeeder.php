<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perusahaan::create([
            'nama_perusahaan' => 'PTBA'
        ]);
        Perusahaan::create([
            'nama_perusahaan' => 'GUEST'
        ]);
    }
}
