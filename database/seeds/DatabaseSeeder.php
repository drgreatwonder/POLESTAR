<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserstableSeeder::class);

        $this->call(ConversationTableSeeder::class);

        $this->call(ResponseTableSeeder::class);

        $this->call(ConversationTableSeeder::class);

        $this->call(MediumTableSeeder::class);

}

}
