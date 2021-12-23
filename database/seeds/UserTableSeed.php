<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name'=>'admin',
            'last_name'=>'admin',
            'phone'=>'677551962',
            'password'=>Hash::make('secret'),
            'email'=>'admin@liftus.com',
        ]);

        $user->assignRole('admin');

    }
}
