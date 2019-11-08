<?php

use Illuminate\Database\Seeder;

use App\Conversation;

use App\User;

class ConversationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'The Truth about Love';
        $t2 = 'The Right Outfit for the Right Mood';
        $t3 = 'Work/Life Balance';
        $t4 = 'How to Learn Progrmming in 3months';
        $t5 = 'The Best Club in England';
        $t6 = 'The Best Place to Take a Summer Vacation';
        $t7 = 'What\'s up in the United States';

        $c1 = [

            'title' => $t1,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',

            'medium_id' => 1,

            'user_id' => 1,

            'slug' => str_slug($t1)
        ];


        $c2 = [

            'title' => $t2,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',

            'medium_id' => 2,

            'user_id' => 2,

            'slug' => str_slug($t2)
        ];

        $c3 = [

            'title' => $t3,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',

            'medium_id' => 3,

            'user_id' => 3,

            'slug' => str_slug($t3)
        ];

        $c4 = [

            'title' => $t4,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',

            'medium_id' => 4,

            'user_id' => 4,

            'slug' => str_slug($t4)
        ];

        $c5 = [

            'title' => $t5,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',

            'medium_id' => 5,

            'user_id' => 5,

            'slug' => str_slug($t5)
        ];

        $c6 = [

            'title' => $t6,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',

            'medium_id' => 6,

            'user_id' => 6,

            'slug' => str_slug($t6)
        ];

        $c7 = [

            'title' => $t7,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',

            'medium_id' => 9,

            'user_id' => 7,

            'slug' => str_slug($t7)
        ];

        Conversation::create($c1);
        Conversation::create($c2);
        Conversation::create($c3);
        Conversation::create($c4);
        Conversation::create($c5);
        Conversation::create($c6);
        Conversation::create($c7);
    }


}
