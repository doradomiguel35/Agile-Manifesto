<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert([
            'id' => 1,
            'name' => 'Admin',
            'username' => 'superadmin',
            'email' => 'admin@am.com',
            'password' => Hash::make('admin@123')
        ]);
    }
}
