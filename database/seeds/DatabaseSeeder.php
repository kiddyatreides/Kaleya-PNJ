<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $faker = Faker\Factory::create(); //import library faker
        $limit = 20; //batasan berapa banyak data
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //mengisi datadi database
                'nama' => $faker->name,
                'email' => $faker->unique()->email, //email unique sehingga tidak ada yang sama
                'password' => bcrypt('secret'),
                'tipe' => random_int(1,2),
                'nohp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}