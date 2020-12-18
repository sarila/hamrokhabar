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
        'name' => "Super Admin",
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      Role::insert([
        'name' => "Admin",
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      Role::insert([
        'name' => "Editor",
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      Admin::insert([
        'first_name' => "Sushan",
        'last_name' => "Paudyal",
        'email' => "sushan.paudyal@gmail.com",
        'password' => bcrypt('password'),
        'role_id' => 1,
        'phone' => '9803961735',
        'address' => 'Shantinagar, Kathmandu',
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      Setting::insert([
        'site_title' => 'Hamro Khabar',
        'site_title_np' => 'Hamro Khabar',
        'site_subtitle' => 'pal pal ko khabar',
        'phone_number' => 1234567890,
        'mobile_number' => 1234567890,
        'ads_number' => 1234567890,
        'nirdesak' => 'name ',
        'sampadak' => 'name',
        'email' => 'admin@admin.com',
        'address' => 'Shantinagar, Kathmandu',
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
}
