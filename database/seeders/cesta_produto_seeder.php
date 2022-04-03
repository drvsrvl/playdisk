<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class cesta_produto_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cesta_produto')->insert([
            'cesta_id' => 1,
            'produto_id' => 1,
            'formato_id' => 1,
            'cantidade' => 1
        ]);
    }
}