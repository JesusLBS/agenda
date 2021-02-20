<?php

use Illuminate\Database\Seeder;
use App\activeusers;
use App\role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "administrador";
        $user->email = "al221710026@gmail.com";
        $user->password = "12345";
        $user->active_id = "1";
        $user->role_id = "2";
        $user->save();
    }
    
}
