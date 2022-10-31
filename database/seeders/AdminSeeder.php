<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'lastname' => "Admin",
            'firstname' => "Admin",
            'email' => "admin@admin.com",
            'password' => bcrypt('qslndmdqkhbsd'),
        ]);
        $admin->assignRole("admin");
    }
}
