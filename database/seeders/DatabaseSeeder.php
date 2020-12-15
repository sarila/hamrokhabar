<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
        	'name' => 'Super Admin',
        	'created_at' => now(),
        	'updated_at' => now(),
        ]);

        Role::insert([
        	'name' => 'Admin',
        	'created_at' => now(),
        	'updated_at' => now(),
        ]);

        Role::insert([
        	'name' => 'Editor',
        	'created_at' => now(),
        	'updated_at' => now(),
        ]);

        Admin::insert([
        	'firstname' => 'Sarila',
        	'lastname' => 'Ngakhusi',
        	'email' => 'ngakhusisarila@gmail.com',
        	'password' => bcrypt('admin'),
        	'mobile' => '9861210872',
        	'username' => 'sarilaNgakhusi',
        	'address' => 'Changunarayan, Bhaktapur',
        	'role_id' => '1',
        	'created_at' => now(),
        	'updated_at' => now(),
        ]);
    }
}
