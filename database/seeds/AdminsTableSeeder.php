<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'role'=>'1',
            'is_active'=>1,
            'name'=>'Derek',
            'email'=>'123@yahoo.com.tw',
            'password'=>bcrypt('123456'),
            'remember_token' => str_random(10)
        ]);
    }
}
