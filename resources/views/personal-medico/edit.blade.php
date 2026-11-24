@extends('layouts.app')

@section('titulo', 'Editar profesional')

@section('contenido')
    <h1>Editar profesional</h1>

    <form method="POST" action="{{ route('personal-medico.update', $medico) }}">
        @csrf
        @method('PUT')

        @include('personal-medico._formulario')

        <div class="acciones">
            <button type="submit">Guardar cambios</button>
            <a href="{{ route('personal-medico.show', $medico) }}" class="secondary">Cancelar</a>
        </div>
    </form>
@endsection