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
            'user_role' => '2',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'student_number' => '12345678',
            'email' => '12345678@mydavinci.nl',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Fill the database with random users.
        Factory(App\User::class, 50)->create()->each(function ($user) {});
        // Fill the database with random companies
        Factory(App\Company::class, 10)->create();
        // Fill the database with random reviews
        Factory(App\Review::class, 10)->create();
    }
}
