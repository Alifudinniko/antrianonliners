<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PolySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('polys')->insert([
            'id' => '1',
            'nama' => 'Poli Umum',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('polys')->insert([
            'id' => '2',
            'nama' => 'Poli Gigi',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('polys')->insert([
            'id' => '3',
            'nama' => 'Poli Mata',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('polys')->insert([
            'id' => '4',
            'nama' => 'Poli Anak',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('polys')->insert([
            'id' => '5',
            'nama' => 'Poli Kandungan',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('polys')->insert([
            'id' => '6',
            'nama' => 'Poli Saraf',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
