<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Cafe',
            'email' => 'admin@coffe.com',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ]);
        User::factory()->create([
            'name' => 'Kasir Cafe',
            'email' => 'kasir@coffe.com',
            'role' => 'kasir',
            'password' => bcrypt('kasir123'),
        ]);
        User::factory()->create([
            'name' => 'Pelanggan Cafe',
            'email' => 'pelanggan@coffe.com',
            'role' => 'pelanggan',
            'password' => bcrypt('pelanggan123'),
        ]);

        // Jalankan seeder untuk menu dan order
        $this->call([
            \Database\Seeders\MenuSeeder::class,
            \Database\Seeders\OrderSeeder::class,
        ]);
    }
}
