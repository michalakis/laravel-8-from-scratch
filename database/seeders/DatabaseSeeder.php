<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@istrator.com',
            'password' => Hash::make('!password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('posts')->insert([
            'title' => 'First Post',
            'category_id' => 1,
            'slug' => 'first-post',
            'excerpt' => 'Lorem ipsum dolor sit amet',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('posts')->insert([
            'title' => 'Second Post',
            'category_id' => 2,
            'slug' => 'second-post',
            'excerpt' => 'Lorem ipsum dolor sit amet',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('posts')->insert([
            'title' => 'Third Post',
            'category_id' => 1,
            'slug' => 'third-post',
            'excerpt' => 'Lorem ipsum dolor sit amet',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('posts')->insert([
            'title' => 'Fourth Post',
            'category_id' => 3,
            'slug' => 'fourth-post',
            'excerpt' => 'Lorem ipsum dolor sit amet',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Personal',
            'slug' => 'personal',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Work',
            'slug' => 'work',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
