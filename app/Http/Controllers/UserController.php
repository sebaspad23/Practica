<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function cambiarPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('perfil')->with('success', 'Contraseña actualizada.');
    }

    public function eliminarCuenta()
    {
        $user = Auth::user();
        $user->delete();
        return redirect('/')->with('success', 'Cuenta eliminada.');
    }
}
