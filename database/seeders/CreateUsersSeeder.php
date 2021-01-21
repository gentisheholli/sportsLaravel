<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


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
                'location'=>'Kosovo',
                'sport_they_play' => 'Soccer',
                'tournaments_won' => 'T1',
                'photo'=> 'profile.jpg',
                'video'=> 'video.mp4',
                'is_admin'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@user.com',
               'location'=>'Kosovo',
               'sport_they_play' => 'Soccer',
               'tournaments_won' => 'T1',
               'photo'=> 'profile.jpg',
               'video'=> 'video.mp4',
               'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
