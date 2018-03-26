<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//Admin
        User::create([
			'name'=>'Jorge',
			'email'=>'adipolela@gmail.com',
			'password'=>bcrypt('123'),
			'role'=>0
		]);

		// Client

		User::create([
			'name'=>'vanessa',
			'email'=>'adipol321@gmail.com',
			'password'=>bcrypt('123'),
			'role'=>2
		]);
    }
}
