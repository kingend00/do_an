<?php

use Illuminate\Database\Seeder;

class Seat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('seat')->truncate();
        $seats=[
            ['2'],['2'],['2'],['2'],['2'],['2'],['2'],['2'],['2'],['2'],
            ['4'],['4'],['4'],['4'],['4'],['4'],['4'],['4'],['4'],['4'],
            ['6'],['6'],['6'],['6'],['6'],['6'],['6'],['6'],['6'],['6'],
            ['8'],['8'],['8'],['8'],['8'],['8'],['8'],['8'],['8'],['8'],
            ['10'],['10'],['10'],['10'],['10'],['10'],['10'],['10'],
            ['18'],['18'],['18'],['18'],['18'],['18'],['18'],['18']
            
        ];
        foreach ($seats as $seat) {
            DB::table('seat')->insert([
                'type' => $seat[0]
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
