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
        $user = \App\User::create([
            'name' => 'Amitav Roy',
            'email' => 'reachme@amitavroy.com',
            'password' => bcrypt('password'),
        ]);

        $user->restaurants()->create([
            'name' => 'Wighay Star',
            'location' => 'Bhuvandas Road, N14 Dadar, Mumbai'
        ]);
        $user->restaurants()->create([
            'name' => 'Mainland china',
            'location' => 'Platinum Tech Park, Vashi, Nami Mumbai'
        ]);
        $user->restaurants()->create([
            'name' => 'Mukesh Lunch Home',
            'location' => 'Sai Balaji Tower, Atroli Navi Mumbai'
        ]);
    }
}
