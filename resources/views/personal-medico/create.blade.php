@extends('layouts.app')

@section('titulo', 'Registrar profesional')

@section('contenido')
    <h1>Registrar profesional</h1>

    <form method="POST" action="{{ route('personal-medico.store') }}">
        @csrf

        @include('personal-medico._formulario')

        <div class="acciones">
            <button type="submit">Guardar</button>
            <a href="{{ route('personal-medico.index') }}" class="secondary">Cancelar</a>
        </div>
    </form>
@endsection