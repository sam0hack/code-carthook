<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

    class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('users.json');
        $users = json_decode($json,true);

        foreach ($users as $user){

            User::firstOrCreate(['name'=>$user['name'], 'username'=>$user['username'] ,
                                'email'=>$user['email'], 'password'=>  Hash::make($user['email']),
                                'phone'=>$user['phone'], 'website'=>$user['website'] ]);

        }

    }
}
