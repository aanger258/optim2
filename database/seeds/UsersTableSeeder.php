<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->insert([
            'group_name' => 'high_admin',
            'status' => 1,
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('1234'),
            'mail' => 'leonard.savu98@gmail.com',
            'phone' => '0721867446',
            'address' => 'Bucuresti, Sector 6, Strada Ghirlandei numarul 9',
            'birth_date' => date("Y-m-d", mktime(0, 0, 0, 9, 14, 1998)),
            'status' => 1,
            'group_id' => 1,
        ]);
    }
}
