@extends('layouts.app')

@section('titulo', "$medico->apellidos, $medico->nombres")

@section('contenido')
    <hgroup>
        <h1>{{ $medico->apellidos }}, {{ $medico->nombres }}</h1>
        <p>{{ $medico->especialidad }} · <x-estado :activo="$medico->activo" /></p>
    </hgroup>

    <article>
        <dl>
            <dt>DNI</dt>
            <dd>{{ $medico->dni }}</dd>

            <dt>N° de colegiatura</dt>
            <dd>{{ $medico->colegiatura }}</dd>

            <dt>Cuenta de acceso</dt>
            <dd>
                @if ($medico->user)
                    {{ $medico->user->name }} ({{ $medico->user->email }})
                @else
                    <em>Sin cuenta vinculada</em>
                @endif
            </dd>
        </dl>
    </article>

    <div class="acciones">
        <a href="{{ route('personal-medico.edit', $medico) }}" role="button">Editar</a>

        <form method="POST" action="{{ route('personal-medico.estado', $medico) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="secondary">
                {{ $medico->activo ? 'Desactivar' : 'Reactivar' }}
            </button>
        </form>

        <a href="{{ route('personal-medico.index') }}" class="secondary">Volver al listado</a>
    </div>

    <hr>

    <h2>Últimas citas asignadas</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha y hora</th>
                <th>Paciente</th>
                <th>Motivo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($medico->citas as $cita)
                <tr>
                    <td>{{ $cita->fecha_hora }}</td>
                    <td>{{ $cita->paciente->apellidos }}, {{ $cita->paciente->nombres }}</td>
                    <td>{{ $cita->motivo }}</td>
                    <td>{{ $cita->estado }}</td>
                </tr>
            @empty
                <tr><td colspan="4">Este profesional aún no tiene citas registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection