<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::create([
            'name' => env('DEFAULT_ADMIN_NAME'),
            'email' => env('DEFAULT_ADMIN_EMAIL'),
            'email_verified_at' => now(),
            'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD')),
            'remember_token' => Str::random(10),
        ]);
    }
}
