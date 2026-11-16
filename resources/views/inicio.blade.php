@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <h1>Bienvenido a {{ config('app.name') }}</h1>
    <p>Sistema de gestión para la atención ambulatoria, registro de pacientes, programación de citas y control de historias clínicas.</p>

    <div class="grid">
        <article>
            <header><strong>Pacientes</strong></header>
            <p>Registro y búsqueda de historias clínicas por DNI.</p>
        </article>
        <article>
            <header><strong>Personal médico</strong></header>
            <p>Administración de médicos, enfermeros y especialidades.</p>
        </article>
        <article>
            <header><strong>Citas y Atenciones</strong></header>
            <p>Programación de turnos y registro de consultas médicas.</p>
        </article>
    </div>
@endsection