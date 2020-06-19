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
    		'blog_id' => 1,
    		'user_id' => 1,
            'comment' => 'Thôi thua',
            'created_at' => \Carbon\Carbon::now()
        ]);
        
        DB::table('comments')->insert([
            'blog_id'=> 1,
            'user_id' => 1,
            'comment' => 'Thôi thua2',
            'id_comment' => 1,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
