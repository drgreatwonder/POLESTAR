<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'name' => 'admin',
            'avatar' => asset('avatars/asian-girl-avatar-vector-20779172'),
            'password' => bcrypt('hungry4moreofYou'),
            'email' => 'diamondheartconcepts@gmail.com',
            'admin' => 1
        ]);
    }
}

