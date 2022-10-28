<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=0;$i<=100; $i++){
            Outlet::create([
                'nama_outlet' => $faker->randomElement(['Juragan Laundry','Toke Laundry','Laundry Bersama',
                                'Laundry horang kaya','Super Laundry',
                                'Laundry Kita', 'Laundry Hemat', 'Klink Laundry', 'Gudang Laundry', 'Laundry Inyong', 'Betah Nge-Laundry', 'Eko Laundry', ' Jokowi Laundry', 'Mas-mas Laundry', 'Nyabun Laundry', 'Launindry','Laundry Express']),
                'alamat' => $faker->streetAddress(),
                'no_tlp' => $faker->phoneNumber,
                'slug' => strtolower(Str::random(7))
            ]);
        }
    }
}
