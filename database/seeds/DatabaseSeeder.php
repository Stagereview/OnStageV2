<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed the 2 user roles into the database.
        DB::table('user_role')->insert([
            'name' => 'gebruiker'
        ]);
        DB::table('user_role')->insert([
            'name' => 'administrator'
        ]);

        // Create an admin account
        DB::table('users')->insert([
            'userRole' => '2',
            'firstName' => 'admin',
            'lastName' => 'admin',
            'studentNumber' => '12345678',
            'email' => '12345678@mydavinci.nl',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        // Fill the database with random users.
        factory(App\User::class, 50)->create()->each(function ($user) {});
    }
}
