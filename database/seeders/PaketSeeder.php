<?php

namespace Database\Seeders;

use App\Models\Outlet;
use App\Models\Paket;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $paket = ['Kiloan','Boneka','karpet','Setrika','Kaos'];
        $harga = ['5000','7500','15000','2000','5000'];
        $outlet = Outlet::pluck('id')->toArray();


        for($i=0;$i<count($paket);$i++){
            Paket::create([
                'outlet_id' => $faker->randomDigit(),
                'nama_paket'=> $paket[$i],
                'slug'=> Str::slug($paket[$i]),
                'harga'=> $harga[$i],
            ]);
        }
    }
}
