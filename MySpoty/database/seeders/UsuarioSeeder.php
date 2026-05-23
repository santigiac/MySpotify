<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'name'   => 'Administrador',
            'email'  => 'admin@mispoty.com',
            'password' => Hash::make('admin1234'),
            'role'   => 'admin',
            'activo' => true,
        ]);

        Usuario::create([
            'name'   => 'Carlos García',
            'email'  => 'carlos@mispoty.com',
            'password' => Hash::make('password'),
            'role'   => 'cliente',
            'activo' => true,
        ]);

        Usuario::create([
            'name'   => 'Laura Martínez',
            'email'  => 'laura@mispoty.com',
            'password' => Hash::make('password'),
            'role'   => 'cliente',
            'activo' => true,
        ]);

        Usuario::create([
            'name'   => 'Sergio López',
            'email'  => 'sergio@mispoty.com',
            'password' => Hash::make('password'),
            'role'   => 'cliente',
            'activo' => true,
        ]);
    }
}
