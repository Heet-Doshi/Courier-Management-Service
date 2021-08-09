<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'branch_id' => 1,
            'name' => 'heet Doshi',
            'email' => 'heet@gmail.com', 
            'username' => 'admin',
            'password' => bcrypt('Heet009'),
        ]);

        DB::table('users')->insert([
                'role_id' => 2,
                'branch_id' => 2 ,
                'name' => 'Ayushi Doshi',
                'email' => 'ayushi@gmail.com', 
                'username' => 'staff',
                'password' => bcrypt('Heet009'),
        ]);
    }
}
