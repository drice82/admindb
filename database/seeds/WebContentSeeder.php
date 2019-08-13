<?php

use Illuminate\Database\Seeder;
use App\WebContent;

class WebContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	DB::table('web_contents')->insert([
	    'key' => 'announcement',
	    'value' => 'announcement'
	]);
    }
}
