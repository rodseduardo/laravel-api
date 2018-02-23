<?php

use Illuminate\Database\Seeder;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['lm'=>'010203', 'name'=>'Furadeira XPTO', 'free_shippin'=> 1, 'description' => 'Furadeira muito boa', 'price' => '3.90'],
            ['lm'=>'090807', 'name'=>'Furadeira KVALSLS', 'free_shippin'=> 0, 'description' => 'Furadeira boa', 'price' => '2.90'],
            ['lm'=>'01202', 'name'=>'Cadeira de Madeira', 'free_shippin'=> 1, 'description' => 'Cadeira para escritorio', 'price' => '31.30'],
        ];

        DB::table('products')->truncate();
        DB::table('products')->insert($data);
    }
}
