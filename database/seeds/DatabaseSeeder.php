<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Media', 10)->create();
        factory('App\Review', 10)->create();
        factory('App\Rating', 10)->create();
    }
}
