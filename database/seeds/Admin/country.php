<?php

use Illuminate\Database\Seeder;

class country extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
    		'name'=> "England",
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
