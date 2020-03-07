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
        	'tittle' => Str::random(3),
        	'image' => Str::random(3),
        	'content' => 'alwnfjahwfiljawljhfwahnflwanlrkwja',
        ]);
    }
}
