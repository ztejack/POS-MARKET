<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\detailTransaksi>
 */
class DetailTransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $product = Produk::get();
        $price = mt_rand(5000, 1000000);

        return [
            'id_Transaksi' => mt_rand(1, 10),
            'id_Produk' => mt_rand(1, 100),
            'namaPrd' => $this->faker->sentence(1),
            'kodePrd' => $this->faker->numerify('##########'),
            'price' => $price,
            'modalprice' => $price - 2000,
            'satuan' => $this->faker->sentence(1),
            'qty' => mt_rand(10, 100),
            'subtotal' => mt_rand(50000, 100000),
        ];
    }
}
