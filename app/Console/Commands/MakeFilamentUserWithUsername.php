<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Filament\Facades\Filament;

class MakeFilamentUserWithUsername extends Command
{
    protected $signature = 'make:filament-user-username';
    protected $description = 'Create a new Filament user with a username instead of an email';

    public function handle()
    {
        // Meminta input untuk username, nama, dan password
        $username = $this->ask('Username');
        $name = $this->ask('Name');
        $password = $this->ask('Password');

        // Meminta pilihan role untuk pengguna
//        $roleName = $this->choice(
//            'Select a role for the user',
//            ['RW', 'RT', 'Warga'],
//            2 // Default to 'Warga'
//        );

        $userClass = User::class;

        $user = new $userClass();
        $user->username = $username;
        $user->name = $name;
        $user->password = Hash::make($password);
        // Menetapkan peran yang dipilih ke pengguna
//        $user->role = $roleName;

        // Menyimpan pengguna
        $user->save();

        /*// Menetapkan peran yang dipilih ke pengguna
        $user->assignRole($roleName);*/

        // Menampilkan pesan sukses
        $this->info("User [{$name}] created successfully.");
    }
}
