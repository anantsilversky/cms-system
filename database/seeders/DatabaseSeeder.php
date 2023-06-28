<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Post;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
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

        // Post::factory(2)->create();


        // Role::factory(10)->create();

        // User::factory()
        //     ->has(Role::factory()->count(3))
        //     ->create();

        $user = User::find(1);
        Post::factory(10)->for($user)->create();

        // User::factory()->hasPosts(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // student course example

        // Student::factory(10)->has(Course::factory(2))->create();

        // $course = Course::find(2);
        // Student::factory(2)->hasAttached($course)->create();

    }
}
