<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::query()->insert([
            ['name'=>'admin','persian_name'=>'مدیر سایت'],
            ['name'=>'customer','persian_name'=>'مشتری'],
        ]);



    }
}
