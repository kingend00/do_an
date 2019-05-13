<?php

use Illuminate\Database\Seeder;

class Time extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('time')->truncate();
        $times = [
            []


        ];

        Schema::enableForeignKeyConstraints();
    }
}
