<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class produtos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => Str::random(10),
            'descripcion' => Str::random(10),
            'caratula' => Str::random(10),
            'data_lanzamento' => date('Y-m-d'),
            'data' => date('Y-m-d')
        ]);
    }
}

