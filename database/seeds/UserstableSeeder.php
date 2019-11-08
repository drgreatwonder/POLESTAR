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
            'avatar' => asset('avatars/asian-girl-avatar-vector-20779172.jpg'),
            'password' => bcrypt('hungry4moreofYou'),
            'email' => 'diamondheartconcepts@gmail.com',
            'admin' => 1
        ]);

        App\User::create([

            'name' => 'Mary',
            'avatar' => asset('avatars/asian-girl-avatar-vector-20779172.jpg'),
            'password' => bcrypt('password'),
            'email' => 'tobili@gmail.com',
        ]);

        App\User::create([

            'name' => 'Joy',
            'avatar' => asset('avatars/asian-girl-avatar-vector-20779172.jpg'),
            'password' => bcrypt('password'),
            'email' => 'joyli13@gmail.com',
        ]);

        App\User::create([

            'name' => 'Precious',
            'avatar' => asset('avatars/asian-girl-avatar-vector-20779172.jpg'),
            'password' => bcrypt('password'),
            'email' => 'nzubechukwu.okoye@gmail.com',
        ]);

        App\User::create([

            'name' => 'Bisi',
            'avatar' => asset('avatars/asian-girl-avatar-vector-20779172.jpg'),
            'password' => bcrypt('password'),
            'email' => 'bendavidosondu@gmail.com',
        ]);

        App\User::create([

            'name' => 'Wale',
            'avatar' => asset('avatars/asian-girl-avatar-vector-20779172.jpg'),
            'password' => bcrypt('password'),
            'email' => 'd.akagha20@gmail.com',
        ]);

        App\User::create([

            'name' => 'Benson',
            'avatar' => asset('avatars/asian-girl-avatar-vector-20779172.jpg'),
            'password' => bcrypt('password'),
            'email' => 'benson@gmail.com',
        ]);

        App\User::create([

            'name' => 'Lopez',
            'avatar' => asset('avatars/asian-girl-avatar-vector-20779172.jpg'),
            'password' => bcrypt('password'),
            'email' => 'lopez20@gmail.com',
        ]);


    }

}
