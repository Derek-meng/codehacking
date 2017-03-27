<?php

use Illuminate\Database\Seeder;
use App\AboutMe;

class AboutMeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AboutMe::create([
            'title'=>'About Derek',
            'body'=>'Hi This is Derek blog about Laravel'
        ]);
    }
}
