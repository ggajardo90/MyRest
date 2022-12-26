<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user=User::create([
            'name'=>'admin',
            'username'=>'admin',
            'email'=>'admin@test.cl',
            'email_verified_at'=> now(),
            'password'=>bcrypt('password'),
            'image_path'=>'default.jpg'
        ]);

        $user->assignRole('Admin');

        User::factory(5)->create();

    }
}
