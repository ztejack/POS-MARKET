<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_pelanggan' => mt_rand(1, 6),
            'metode_Byr' => mt_rand(0, 1),
            'id_tagihan' => mt_rand(1, 6),
            'total_Byr' => mt_rand(15000, 500000),
        ];
    }
}
