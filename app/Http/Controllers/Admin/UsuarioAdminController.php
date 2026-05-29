<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioAdminController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar', '');

        $query = Usuario::where('role', 'cliente');

        if ($buscar !== '') {
            $query->where(function ($q) use ($buscar) {
                $q->where('name', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('email', 'LIKE', '%' . $buscar . '%');
            });
        }

        $usuarios = $query->orderBy('name')->paginate(20);

        return view('admin.usuarios.index', compact('usuarios', 'buscar'));
    }

    public function toggleActivo(Usuario $usuario)
    {
        if ($usuario->role === 'admin') {
            return back()->with('error', 'No se puede deshabilitar a un administrador.');
        }

        $usuario->update(['activo' => !$usuario->activo]);

        $mensaje = $usuario->activo ? 'Usuario habilitado.' : 'Usuario deshabilitado.';

        return back()->with('exito', $mensaje);
    }
}
