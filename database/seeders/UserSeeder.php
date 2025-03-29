<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
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
        $admin = User::updateOrCreate(
            ['email' => 'admin@filament.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456'),
                'email_verified_at' => now(),
            ]
        );

        Profile::updateOrCreate(
            ['user_id' => $admin->id],
        );

        // Regular User
        $nageeb = User::updateOrCreate(
            ['email' => 'nageeb@zaytonaah.com'],
            [
                'name' => 'Nageeb',
                'password' => Hash::make('nageeb@zaytonaah.com'),
                'email_verified_at' => now(),
            ]
        );

        Profile::updateOrCreate(
            ['user_id' => $nageeb->id],
        );
    }
}
