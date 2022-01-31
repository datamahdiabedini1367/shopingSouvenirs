<?php

namespace Database\Seeders;

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
//        User::query()->truncate();
        $this->call([
            RoleTableSeeder::class,
            UsersTableSeeder::class,
            CategoryTableSeeder::class,
            ProductTableSeeder::class,
        ]);

    }
}
