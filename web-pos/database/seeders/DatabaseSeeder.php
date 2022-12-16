<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetailTransaksi;
use App\Models\Level;
use App\Models\Perusahaan;
use App\Models\Produk;
use App\Models\Satker;
use App\Models\Tagihan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LevelSeeder::class,
            ProdukSeeder::class,
            PerusahaanSeeder::class,
            SatkerSeeder::class,
            UserSeeder::class,
        ]);
        // User::created([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'level_id' => '0',
        //     'password' => md5('123'),
        // ]);
        // Level::factory(3)->create();
        Perusahaan::factory(10)->create();
        Satker::factory(30)->create();
        User::factory(10)->create();
        Tagihan::factory(10)->create();
        Produk::factory(100)->create();
        Transaksi::factory(50)->create();
        DetailTransaksi::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
