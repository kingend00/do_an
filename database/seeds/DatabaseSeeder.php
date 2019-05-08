<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(Menu::class);
        $this->call(Seat::class);
        $this->call(Category::class);
        $this->call(User::class);
        $this->call(Combo::class);
    }
}
