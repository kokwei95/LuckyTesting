<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@admin.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'John',
                'email'=>'john@user.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Carol',
                'email'=>'carol@user.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Kenny',
                'email'=>'kenny@user.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Jason',
                'email'=>'jason@user.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Sean',
                'email'=>'sean@user.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
             ],
             [
               'name'=>'Lisa',
               'email'=>'lisa@user.com',
               'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
