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
        \App\User::create([
            'name' => 'Lena',
            'lastname'=>'Bjekovic',
            'email' => 'lena@gmail.com',
            'password' => bcrypt('admin123'),
            'phone_number' => '0643737373',
            'city' => 'Beograd'
        ]);
        factory(App\User::class, 20)->create();
    }
}
