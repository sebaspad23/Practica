<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::where('user_id', Auth::id())->paginate(5);
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'abreviacion' => 'required',
            'aula' => 'required',
            'descripcion' => 'nullable',
            'icono' => 'nullable|image',
        ]);

        $curso = new Curso($request->all());
        $curso->user_id = Auth::id();
        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso creado correctamente.');
    }

    public function destroy(Curso $curso)
    {
        if ($curso->user_id === Auth::id()) {
            $curso->delete();
            return redirect()->route('cursos.index')->with('success', 'Curso eliminado.');
        }

        return redirect()->route('cursos.index')->with('error', 'No puedes eliminar este curso.');
    }
}

