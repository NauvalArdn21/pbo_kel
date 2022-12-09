<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 1800) as $index) {
            Barang::create([
                'nama_barang' => $faker->city,
                'harga' => $faker->numberBetween($min = 500, $max = 8000),
                'stok' => 100,
                'kode_barang' => getKodeBarang(),
                'status_barang' => 'Tidak Rusak',
                'is_delete' => 0
            ]);
        }
    }
}
