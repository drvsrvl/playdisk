<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class perfils_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfils')->insert([
            'login' => Str::random(10),
            'descripcion' => Str::random(10),
            'foto' => Str::random(10),
            'user_id' => 1,
            'rol' => 'admin'
        ]);
    }
}
