<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('cfb_users')->delete();
		User::create(array(
			'nombre'     => 'Administrador CFB',
			'username'   => 'cfb',
			//'email'    => 'chris@scotch.io',
			'password'   => Hash::make('cfb'),
		));
	}

}
