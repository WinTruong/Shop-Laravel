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
    		'name' => "tructruong",
    		'email' => "tt@gmail.com",
    		'password' => bcrypt('123123123'),
            'level' => 1,
            'created_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => "ttt",
            'email' => "t3t@gmail.com",
            'password' => bcrypt('123123123'),
            'level' => 0,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
