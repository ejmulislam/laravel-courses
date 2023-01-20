<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Topic;
use App\Models\Author;
use App\Models\Course;
use App\Models\Review;
use App\Models\Series;
use App\Models\Platform;
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
        User::create([
            'name' => 'Admin',
            'email' => 'hi@admin.me',
            'password' => bcrypt('password'),
            'type' => 1,
        ]);


        $series = [
            [
                'name' => 'Laravel',
                'image' => 'https://i.pinimg.com/564x/de/86/29/de8629935b90d646b825e2adbfce0395.jpg',
                'slug' => 'laravel',
            ],
            [
                'name' => 'PHP',
                'image' => 'https://i.pinimg.com/736x/2d/3a/7d/2d3a7d7d1ad7adeded994de246f60c43.jpg',
                'slug' => 'php'
            ],
            [
                'name' => 'Livewire',
                'image' => 'https://i.pinimg.com/564x/81/1b/95/811b954c974b907ae38b13203af0cee8.jpg',
                'slug' => 'Livewire',
            ],
            [
                'name' => 'Vue.js',
                'image' => 'https://i.pinimg.com/564x/4a/07/48/4a0748d729ce3f3b2d149cb7808c429f.jpg',
                'slug' => 'vue_js'

            ],
        ];
        foreach ($series as $item) {
            Series::create([
                'name' => $item['name'],
                'image' => $item['image'],
                'slug' => $item['slug'],
            ]);
        }

        $topics = ['Eloquent', 'Validation', 'Refactoring', 'Testing'];
        foreach($topics as $item) {
            //string to slug
            $slug = strtolower(str_replace(' ', '-', $item));

            Topic::create([
                'name' => $item,
                'slug' => $slug,
            ]);
        }

        $platfrom = ['Laracasts', 'Laravel Daily', 'Codecourse', 'Spatie'];
        foreach ($platfrom as $item) {
            Platform::create([
                'name' => $item,
            ]);
        }

        // fake 50 users
        User::factory(50)->create();
        // fake 10 authors create
        Author::factory(10)->create();
        // fake 100 courses create
        Course::factory(100)->create();

        // multiple relation assigned
        $courses = Course::all();
        foreach($courses as $course) {
            //random series array
            $series = Series::all()->random(rand(1, 4))->pluck('id')->toArray();
            $course->series()->attach($series);

            //random topics array
            $topics = Topic::all()->random(rand(1, 4))->pluck('id')->toArray();
            $course->topics()->attach($topics);

            //random authors array
            $authors = Author::all()->random(rand(1, 3))->pluck('id')->toArray();
            $course->authors()->attach($authors);
        }

        //fake 100 reviews create
        Review::factory(100)->create();


    }
}
