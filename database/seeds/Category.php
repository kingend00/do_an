<?php

use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('category')->truncate();
        $categorys = [
            ['dinner'],
            ['lunch'],
            ['starters'],
            ['dessert'],
            ['drink']


        ];
        foreach ($categorys as $category) {
            DB::table('category')->insert([
                'name' => $category[0]
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
