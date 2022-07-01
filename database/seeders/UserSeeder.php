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
            'password'=>bcrypt('password')
        ]);

        $user->assignRole('Admin');

        User::factory(9)->create();

    }
}