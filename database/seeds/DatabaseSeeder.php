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

        DB::table('user_type')->insert([ //mengisi datadi database
            'nama' => 'Penyedia Acara',
            'deskripsi' => 'NULL',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([ //mengisi datadi database
            'nama' => 'Masyarakat',
            'deskripsi' => 'NULL',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([ //mengisi datadi database
            'nama' => 'Sponsor',
            'deskripsi' => 'NULL',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([ //mengisi datadi database
            'nama' => 'Media Partner',
            'deskripsi' => 'NULL',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([ //mengisi datadi database
            'nama' => 'Pengusaha',
            'deskripsi' => 'NULL',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $faker = Faker\Factory::create(); //import library faker
        $limit = 20; //batasan berapa banyak data
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //mengisi datadi database
                'nama' => $faker->name,
                'email' => $faker->unique()->email, //email unique sehingga tidak ada yang sama
                'password' => bcrypt('secret'),
                'tipe' => random_int(1,5),
                'nohp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        for ($i = 0; $i < 15; $i++) {
            DB::table('acara')->insert([ //mengisi datadi database
                'user_id' => rand(1,10),
                'judul' => $faker->unique()->name(), //email unique sehingga tidak ada yang sama
                'deskripsi' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                'tanggal_mulai' => date('Y-m-d H:i:s'),
                'tanggal_berakhir' => date('Y-m-d H:i:s'),
                'harga_tiket' => rand('293838921','123212138293821'),
                'jumlah_tiket' => rand('100','1000'),
                'alamat' => $faker->address,
                'statusSponsor' => $faker->address,
                'statusMediaPartner' => $faker->address,
                'sstatusOpenBooth' => $faker->address,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }


    }
}
