<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{
    public function mostrar()
    {
        if (Auth::check()) {
            return redirect(Auth::user()->role === 'admin' ? '/admin/inicio' : '/inicio');
        }

        return view('auth.login');
    }

    public function entrar(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'El correo electrónico es obligatorio.',
            'email.email'       => 'El correo electrónico no tiene un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Comprobar si la cuenta existe y está activa antes de autenticar
        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && !$usuario->activo) {
            return back()
                ->withErrors(['email' => 'Tu cuenta está deshabilitada.'])
                ->withInput($request->only('email'));
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->boolean('recuerdame'))) {
            return back()
                ->withErrors(['email' => 'Las credenciales proporcionadas son incorrectas.'])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        return redirect(Auth::user()->role === 'admin' ? '/admin/inicio' : '/inicio');
    }

    public function salir(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
