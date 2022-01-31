<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('addresses')->truncate();
//        DB::table('users')->truncate();
//        Address::query()->truncate();
        $user_all = User::all();
        foreach ($user_all as $user){
            $user->delete();
        }
        $pass = Hash::make('P@ssw0rd');
        $user = User::query()->create([
            'email'=>'admin@gmail.com',
            'password'=>$pass,
            'firstname'=>'admin',
            'lastname'=>'admin',
            'mobile'=>'09912345678',
        ]);
        $user->roles()->sync([1,2]);
        $user = User::query()->create([
            'email'=>'customer@gmail.com',
            'password'=>$pass,
            'firstname'=>'customer',
            'lastname'=>'customer',
            'mobile'=>'09125036452',
        ]);
        $user->roles()->sync([2]);


        User::factory(10)->create();

    }


}
