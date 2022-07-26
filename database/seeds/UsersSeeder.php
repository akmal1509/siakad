<?php

use App\Siswa;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('users')->insert(
            [
                'name' => "Admin",
                'email' => "admin@gmail.com",
                'password' => Hash::make('12345678'),
                'role' => 'Admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        );

        for ($i = 0; $i < 100; $i++) {
            $telp = str_replace("(+62)", "08", $faker->phoneNumber);
            $telp = str_replace(" ", "", $telp);
            $siswa = Siswa::create([
                'no_induk' => $faker->unique(true)->numerify('##########'),
                'nis' => $faker->unique(true)->numerify('##########'),
                'nama_siswa' => $faker->name,
                'jk' => $faker->randomElement(['L', 'P']),
                'telp' => $telp,
                'tmp_lahir' => $faker->city,
                'tgl_lahir' => $faker->dateTimeBetween('-30 years', '-18 years'),
                'foto' => $faker->imageUrl(200, 200, 'people'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            User::create([
                'name' => $siswa->nama_siswa,
                'email' => $siswa->nis,
                'password' => Hash::make('12345678'),
                'role' => 'Siswa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'no_induk' => $siswa->no_induk,
            ]);
        }
    }
}
