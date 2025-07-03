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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $super_admin = User::whare('email', 'superadmin@local.com')->first();

        if(empty($super_admin)){
            User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@local.com',
                'password' => Hash::make('1212'),
            ]); 
        }
            
        
    }
}
