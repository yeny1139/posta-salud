<div class="grid">
    <label>
        DNI *
        <input type="text" name="dni" maxlength="8" inputmode="numeric"
               value="{{ old('dni', $medico->dni) }}" required
               @error('dni') aria-invalid="true" @enderror>
        @error('dni')<small>{{ $message }}</small>@enderror
    </label>

    <label>
        N° de colegiatura *
        <input type="text" name="colegiatura" maxlength="6" inputmode="numeric"
               value="{{ old('colegiatura', $medico->colegiatura) }}" required
               @error('colegiatura') aria-invalid="true" @enderror>
        @error('colegiatura')<small>{{ $message }}</small>@enderror
    </label>
</div>

<div class="grid">
    <label>
        Nombres *
        <input type="text" name="nombres" maxlength="80"
               value="{{ old('nombres', $medico->nombres) }}" required
               @error('nombres') aria-invalid="true" @enderror>
        @error('nombres')<small>{{ $message }}</small>@enderror
    </label>

    <label>
        Apellidos *
        <input type="text" name="apellidos" maxlength="80"
               value="{{ old('apellidos', $medico->apellidos) }}" required
               @error('apellidos') aria-invalid="true" @enderror>
        @error('apellidos')<small>{{ $message }}</small>@enderror
    </label>
</div>

<div class="grid">
    <label>
        Especialidad *
        <select name="especialidad" required
                @error('especialidad') aria-invalid="true" @enderror>
            <option value="">Seleccione...</option>
            @foreach (\App\Models\PersonalMedico::ESPECIALIDADES as $esp)
                <option value="{{ $esp }}"
                    @selected(old('especialidad', $medico->especialidad) === $esp)>
                    {{ $esp }}
                </option>
            @endforeach
        </select>
        @error('especialidad')<small>{{ $message }}</small>@enderror
    </label>

    <label>
        Cuenta de acceso (opcional)
        <select name="user_id" @error('user_id') aria-invalid="true" @enderror>
            <option value="">Sin cuenta vinculada</option>
            @foreach ($cuentas as $cuenta)
                <option value="{{ $cuenta->id }}"
                    @selected(old('user_id', $medico->user_id) == $cuenta->id)>
                    {{ $cuenta->name }} ({{ $cuenta->email }})
                </option>
            @endforeach
        </select>
        @error('user_id')<small>{{ $message }}</small>@enderror
    </label>
</div>