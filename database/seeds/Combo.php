<?php

use Illuminate\Database\Seeder;

class Combo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('combo')->truncate();
        DB::table('combo_details')->truncate();
        $combos = [
            ['gói mùa hè',10,'20 người','slow6.jpg',2500000],
            ['gói mùa đông',8,'18 người','slow7.jpg',2000000],
            ['gói mùa hạ',10,'20 người','slow5.jpg',1800000],
            ['gói mùa xuân',12,'22 người','slow8.jpg',5500000]


        ];
        $combo_details = [
            [1,2,10,'sp'],
            [1,3,15,'sp'],
            [2,4,8,'sp'],
            [2,5,9,'sp'],
            [3,6,5,'sp'],
            [3,7,12,'sp'],
            [3,8,6,'sp'],
            [4,8,7,'sp'],
            [4,1,5,'sp'],
            [4,4,10,'sp'],
            [4,5,12,'sp']

        ];
        foreach ($combos as $combo) {
            DB::table('combo')->insert([
                'name' => $combo[0],
                'discount' => $combo[1],
                'type' => $combo[2],
                'image' => $combo[3],
                'price' => $combo[4]
            ]);
        }
        
        foreach ($combo_details as $combo) {
            DB::table('combo_details')->insert([
                'combo_id' => $combo[0],
                'menu_id' => $combo[1],
                'quantity' => $combo[2],
                'type' => $combo[3]
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
