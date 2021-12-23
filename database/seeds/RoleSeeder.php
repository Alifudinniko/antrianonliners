<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => '1',
            'nama' => 'Admin',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'id' => '2',
            'nama' => 'Officer',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'id' => '3',
            'nama' => 'Pasien',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
