<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        $users = [
            ['Boss','admin@gmail.com',bcrypt('admin'),'0375225004','Hà nội','1',99999],


        ];
        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user[0],
                'email' => $user[1],
                'password' => $user[2],
                'phone' => $user[3],
                'address' => $user[4],
                'roles' => $user[5],
                'point' => $user[6]
            ]);
        }


        Schema::enableForeignKeyConstraints();
    }
}
