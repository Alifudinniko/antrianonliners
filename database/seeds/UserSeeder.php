<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'nik' => '12345678910',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
            'jk' => 'laki-laki',
            'role_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'nik' => '10987654321',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'jk' => 'perempuan',
            'role_id' => '2',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Officer',
            'nik' => '109111111111',
            'email' => 'officer@gmail.com',
            'password' => Hash::make('officer123'),
            'jk' => 'perempuan',
            'role_id' => '2',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id' => '22',
            'name' => 'Poli Gigi',
            'nik' => '01234567',
            'email' => 'poligigi@gmail.com',
            'password' => Hash::make('poligigi@gmail.com'),
            'jk' => 'perempuan',
            'role_id' => '2',
            'poli' => '2',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id' => '23',
            'name' => 'Poli Umum',
            'nik' => '02234567',
            'email' => 'poliumum@gmail.com',
            'password' => Hash::make('poliumum@gmail.com'),
            'jk' => 'perempuan',
            'role_id' => '2',
            'poli' => '1',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id' => '24',
            'name' => 'Poli Anak',
            'nik' => '03234567',
            'email' => 'polianak@gmail.com',
            'password' => Hash::make('polianak@gmail.com'),
            'jk' => 'perempuan',
            'role_id' => '2',
            'poli' => '4',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id' => '25',
            'name' => 'Poli mata',
            'nik' => '04234567',
            'email' => 'polimata@gmail.com',
            'password' => Hash::make('polimata@gmail.com'),
            'jk' => 'perempuan',
            'role_id' => '2',
            'poli' => '3',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'id' => '26',
            'name' => 'Poli Saraf',
            'nik' => '05234567',
            'email' => 'polisaraf@gmail.com',
            'password' => Hash::make('polisaraf@gmail.com'),
            'jk' => 'perempuan',
            'role_id' => '2',
            'poli' => '6',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
