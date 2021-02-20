<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Diego Souza',
        //     'email' => 'diegosouzagestor@gmail.com',
        //     'password' => bcrypt('123456'), 
        // ]);

        factory(User::class, 10)->create();


    }
}
