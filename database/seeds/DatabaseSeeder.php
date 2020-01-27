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
        factory(App\category::class,4)->create();
        factory(App\city::class,8)->create();
        factory(App\flyer::class,200)->create();
    }
}
