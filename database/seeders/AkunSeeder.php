<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            [
                'username' => 'PemilikApotek',
                'name' => 'ini adalah PemilikApotek',
                'email' => 'PemilikApotek@gmail.com',
                'level' => 'PemilikApotek',
                'password' => bcrypt('PemilikApotek123!!')
            ],
            [
                'username' => 'Karyawan',
                'name' => 'ini adalah karyawan',
                'email' => 'Karyawan@gmail.com',
                'level' => 'Karyawan',
                'password' => bcrypt('Karyawan123!!')
            ]
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
