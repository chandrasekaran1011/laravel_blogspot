<?php

use Illuminate\Database\Seeder;

class settingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\setting::create([
        	'site_name'=>'devChandru blog',
        	'address'=>'Chennai',
        	'contact_number'=>'7904067241',
        	'contact_email'=>'chandrasekaran1011@gmail.com'


        ]);
    }
}
