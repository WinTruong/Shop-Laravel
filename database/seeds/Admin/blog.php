<?php

use Illuminate\Database\Seeder;

class blog extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'user_id' => 1,
        	'tittle' => Str::random(3),
        	'image' => "148600.jpg",
        	'content' => 'File seed',
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
