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
        factory(App\Models\User::class, 5)->create()->each(function ($u) {
            factory(App\Models\Post::class, 3)->create([

                'user_id' => $u->id
                
            ]);
        });
    }
}
