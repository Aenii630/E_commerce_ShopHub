<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin User
        User::create([
            'name'     => 'Admin',
            'email'    => 'aenagul561@gmail.com',
            'password' => bcrypt('admin123'),
            'role'     => 'admin',
        ]);

        // Regular Test User
        User::create([
            'name'     => 'Test User',
            'email'    => 'user@test.com',
            'password' => bcrypt('password'),
            'role'     => 'user',
        ]);

        // Products
        $this->call(ProductSeeder::class);
    }
}