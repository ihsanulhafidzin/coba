<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ihsanul Hafidzin',
            'email' => 'ikhsankhafidin1@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
