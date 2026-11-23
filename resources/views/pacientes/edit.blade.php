@extends('layouts.app')

@section('titulo', 'Editar paciente')

@section('contenido')
    <h1>Editar paciente</h1>

    <form method="POST" action="{{ route('pacientes.update', $paciente) }}" novalidate>
        @csrf
        @method('PUT')
        @include('pacientes._form')

        <div class="acciones">
            <button type="submit">Actualizar</button>
            <a href="{{ route('pacientes.show', $paciente) }}">Cancelar</a>
        </div>
    </form>
@endsection