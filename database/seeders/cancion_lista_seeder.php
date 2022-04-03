<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class cancion_lista_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cancion_lista')->insert([
            'cancion_id' => 1,
            'lista_id' => 1,
            'posicion' => 1,
            'data' => date('Y-m-d')
        ]);
    }
}