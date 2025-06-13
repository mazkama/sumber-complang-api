<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk jenis parkir
        User::create([
            'username' => 'Anonymous',
            'name' => 'Anonymous User',
            'no_hp' => '08123456789',
            'role' => 'pengunjung',
            'password' => bcrypt('Anonymous'),
        ]);
    }
}
