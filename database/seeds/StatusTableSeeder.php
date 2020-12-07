<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('Statuses')->insert([
        	[
        		'name' => 'Complete'
        	],
        	[
        		'name' => 'In Progress'
        	],
        	[
        		'name' => 'Cancelled'
        	]
        ]);
    }
}
