<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([  //stavljen u $user varijablu da bi mogao da se koristi $user->id
            'name' => 'mirko',
            'email' => 'mirko@mail.com',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, dignissimos!',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
