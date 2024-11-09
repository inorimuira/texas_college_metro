<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::insert([
            [
            'name' => 'Admin',
            'username' => 'admin123',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            ],
            [
            'name' => 'Guru',
            'username' => 'guru123',
            'email' => 'guru@test.com',
            'password' => Hash::make('password'),
            ],
            [
            'name' => 'Murid',
            'username' => 'murid123',
            'email' => 'murid@test.com',
            'password' => Hash::make('password'),
            ],
        ]);

            // Ambil pengguna yang baru saja diinsert
            $admin = User::where('username', 'admin123')->first();
            $guru = User::where('username', 'guru123')->first();
            $murid = User::where('username', 'murid123')->first();

            // Assign role ke pengguna
            $admin->assignRole('admin');
            $guru->assignRole('guru');
            $murid->assignRole('murid');
    }
}
