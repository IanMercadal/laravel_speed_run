<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ["name" => 'IanCrudo',"email"	=> 'ian@crudo.es',"email_verified_at"	=> now(),"password" => Hash::make('12345678'),"remember_token" => Str::random(10),"user_role" => 'admin'],
            ["name" => 'UserCrudo',"email"	=> 'user@crudo.es',"email_verified_at"	=> now(),"password" => Hash::make('12345678'),"remember_token" => Str::random(10),"user_role" => 'user'],
            ["name" => 'ViewerCrudo',"email"	=> 'viewer@crudo.es',"email_verified_at"	=> now(),"password" => Hash::make('12345678'),"remember_token" => Str::random(10),"user_role" => 'viewer']
        ];
        DB::table('users')->insert($users);
    }
}
