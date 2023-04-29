<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'role' => 'admin',
            'name' => 'Ranjith Acharya',
            'email' => 'test@app.com',
            'password' => Hash::make('123456789'),
        ]);

        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        Role::create(['name' => 'member']);
    }
}
