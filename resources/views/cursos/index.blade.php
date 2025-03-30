@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Cursos</h1>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary">Nuevo Curso</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Abreviación</th>
                <th>Aula</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nombre }}</td>
                    <td>{{ $curso->abreviacion }}</td>
                    <td>{{ $curso->aula }}</td>
                    <td>{{ $curso->descripcion }}</td>
                    <td>
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cursos->links() }}
</div>
@endsection
