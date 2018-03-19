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
		//Support
		User::create([
			'name'=>'Carol',
			'email'=>'adipol123@gmail.com',
			'password'=>bcrypt('123'),
			'role'=>1
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
