<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=0; $i<=100; $i++){
            Customer::create([
                'nama' => $faker->name,
                'email' => $faker->unique->safeEmail,
                'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'alamat' => $faker->streetAddress,
                'no_tlp' => $faker->phoneNumber,
                'slug' => Str::slug($faker->username),
                // 'slug' => strtolower(Str::random(7))
            ]);
        }
    }
}
