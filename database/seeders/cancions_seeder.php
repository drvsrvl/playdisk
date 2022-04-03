<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class cancions_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cancions')->insert([
            'nome' => Str::random(10),
            'duracion' => Str::random(10),
            'arquivo' => Str::random(10),
            'reproduccions' => 0,
            'produto_id' => 1,
            'numero_produto' => 1
        ]);
    }
}
