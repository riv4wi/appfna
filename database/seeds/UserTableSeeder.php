<?php

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
        factory(App\User::class)->create([
            'uuid'      => 'cb9229d1-c0ba-4d9b-9c7f-7f5bcac2f55c',
            'username' 	=> 'helenam',
            'email'     => 'helena.morado@gmail.com',
            'password'  => bcrypt('123'),
        ]);

        factory(App\User::class,  20)->create();
    }
}
