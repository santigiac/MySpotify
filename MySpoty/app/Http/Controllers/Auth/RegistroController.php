<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function mostrar()
    {
        if (Auth::check()) {
            return redirect(Auth::user()->role === 'admin' ? '/admin/inicio' : '/inicio');
        }

        return view('auth.registro');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nombre'             => 'required|string|max:255',
            'email'              => 'required|string|email|max:255|unique:usuarios',
            'password'           => 'required|string|min:8|confirmed',
        ], [
            'nombre.required'    => 'El nombre es obligatorio.',
            'nombre.max'         => 'El nombre no puede superar los 255 caracteres.',
            'email.required'     => 'El correo electrónico es obligatorio.',
            'email.email'        => 'El correo electrónico no tiene un formato válido.',
            'email.unique'       => 'Este correo electrónico ya está registrado.',
            'password.required'  => 'La contraseña es obligatoria.',
            'password.min'       => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $usuario = Usuario::create([
            'name'     => $request->nombre,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'cliente',
            'activo'   => true,
        ]);

        Auth::login($usuario);
        $request->session()->regenerate();

        return redirect('/inicio');
    }
}
