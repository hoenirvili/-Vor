<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class, 1)->create();
    }
}
