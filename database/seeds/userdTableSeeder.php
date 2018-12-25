<?php

use Illuminate\Database\Seeder;

class userdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=App\User::create([
        	'name'=>'Chandrasekaran',
        	'email'=>'chandrasekaran1011@gmail.com',
        	'password'=>bcrypt('10111993'),
            'admin'=>1

        ]);

        App\Profile::create([
            'user_id'=>$user->id,
            'about'=>'lorem ipsum',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com',
            'avatar'=>'uploads/avatars/profile.png'


        ]);
    }
}
