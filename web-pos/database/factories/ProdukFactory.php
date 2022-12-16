<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = mt_rand(5000, 1000000);

        return [
            'kodePrd' => $this->faker->numerify('##########'),
            'namaPrd' => $this->faker->sentence(mt_rand(1, 3)),
            'satuan' => $this->faker->sentence(1),
            'stok' => mt_rand(2, 50),
            'oldprice' => mt_rand(1000, 100000),
            'price' => $price,
            'modalprice' => $price - 2000,

        ];
    }
}
