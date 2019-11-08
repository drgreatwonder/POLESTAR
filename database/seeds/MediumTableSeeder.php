<?php

use Illuminate\Database\Seeder;

use App\Medium;

class MediumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $medium1 = ['title' => 'Faith', 'slug' => str_slug('Faith')];
        $medium2 = ['title' => 'Fashion', 'slug' => str_slug('Fashion')];
        $medium3 = ['title' => 'Life Issues', 'slug' => str_slug('Life Issues')];
        $medium4 = ['title' => 'Programming', 'slug' => str_slug('Programming')];
        $medium5 = ['title' => 'Sports', 'slug' => str_slug('Sports')];
        $medium6 = ['title' => 'Travels &Tours', 'slug' => str_slug('Travels &Tours')];
        $medium7 = ['title' => 'Trending', 'slug' => str_slug('Trending')];

        Medium::create($medium1);
        Medium::create($medium2);
        Medium::create($medium3);
        Medium::create($medium4);
        Medium::create($medium5);
        Medium::create($medium6);
        Medium::create($medium7);

    }
}
