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
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class,50)->create();
        factory(App\category::class,5)->create();
        factory(App\city::class,28)->create();
        factory(App\flyer::class,100)->create();
    }
}
