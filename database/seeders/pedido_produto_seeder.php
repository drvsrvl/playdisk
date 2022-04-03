<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class pedido_produto_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedido_produto')->insert([
            'pedido_id' => 1,
            'produto_id' => 1,
            'formato_id' => 1,
            'cantidade' => 1
        ]);
    }
}