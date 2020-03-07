<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
    		'name'=> Str::random(12),
    		'email' =>Str::random(12).'@gmail.com',
    		'password' => bcrypt('123123123'),
            'avatar' => 'd3.jpg',
            'level' => 0,
        ]);
    }
}
