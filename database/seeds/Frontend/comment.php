<?php

use Illuminate\Database\Seeder;

class comment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
    		'blog_id'=> 3,
    		'user_id' => 1,
    		'avatar' => '_uhdanimals71.jpg',
            'comment' => 'Thôi thua',
            'id_comment' => 0,
        ]);
    }
}
