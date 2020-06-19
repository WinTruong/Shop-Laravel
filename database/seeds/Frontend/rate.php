<?php

use Illuminate\Database\Seeder;

class rate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
        	'blog_id' => 1,
        	'user_id' => 1,
        	'vote' => 4,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
