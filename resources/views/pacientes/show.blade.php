@extends('layouts.app')

@section('titulo', $paciente->apellidos . ', ' . $paciente->nombres)

@section('contenido')
    <hgroup>
        <h1>{{ $paciente->apellidos }}, {{ $paciente->nombres }}</h1>
        <p>DNI {{ $paciente->dni }} · {{ $paciente->fecha_nacimiento->age }} años</p>
    </hgroup>

    <article>
        <p>
            <strong>Fecha de nacimiento:</strong> {{ $paciente->fecha_nacimiento->format('d/m/Y') }}<br>
            <strong>Sexo:</strong> {{ $paciente->sexo === 'F' ? 'Femenino' : 'Masculino' }}<br>
            <strong>Celular:</strong> {{ $paciente->telefono ?? 'No registrado' }}<br>
            <strong>Dirección:</strong> {{ $paciente->direccion ?? 'No registrada' }}
        </p>

        <footer class="acciones">
            <a href="{{ route('pacientes.edit', $paciente) }}" role="button">Editar datos</a>
            <a href="{{ route('pacientes.index') }}">Volver</a>
        </footer>
    </article>

    <h2>Últimas citas</h2>

    <table>
        <thead>
            <tr>
                <th>Fecha y hora</th>
                <th>Médico</th>
                <th>Motivo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($citas as $cita)
                <tr>
                    <td>{{ $cita->fecha_hora->format('d/m/Y H:i') }}</td>
                    <td>{{ $cita->personalMedico->apellidos }} ({{ $cita->personalMedico->especialidad }})</td>
                    <td>{{ $cita->motivo }}</td>
                    <td>{{ $cita->estado }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Este paciente aún no tiene citas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection