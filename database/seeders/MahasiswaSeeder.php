<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        //Facade DB
        for($i = 1; $i <= 10; $i++){
            DB::table('mahasiswa')->insert([
                'user_id' => random_int(1, 5),
                'nim' => $faker->numberBetween(9999999, 99999999),
                'nama_lengkap' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = '2005-01-01'),
                'alamat' => $faker->address,
                'falkutas' => 'SoCS',
                'jurusan' => 'Teknik Informatik'
            ]);
        }
    }
}
