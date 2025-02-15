@extends('layouts.layout')

@section('title', 'Nuevo Docente')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Crear Nuevo Docente</h2>

        <form action="{{ route('docentes.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">Foto Docente</label>
                <input type="file" name="imagen" id="imagen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="DNI">
                    DNI
                </label>
                <input type="text" id="DNI" name="DNI" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('DNI') }}" required>
                @error('DNI')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="apellidos">
                    Apellidos
                </label>
                <input type="text" id="apellidos" name="apellidos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('apellidos') }}" required>
                @error('apellidos')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nombres">
                    Nombres
                </label>
                <input type="text" id="nombres" name="nombres" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nombres') }}" required>
                @error('nombres')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
                    Dirección
                </label>
                <input type="text" id="direccion" name="direccion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('direccion') }}" required>
                @error('direccion')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fechaIngreso">
                    Fecha de Ingreso
                </label>
                <input type="date" id="fechaIngreso" name="fechaIngreso" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('fechaIngreso') }}" required>
                @error('fechaIngreso')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="seguroSocial">
                    Seguro Social
                </label>
                <input type="text" id="seguroSocial" name="seguroSocial" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('seguroSocial') }}">
                @error('seguroSocial')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_tipo_docente">
                    Tipo de Docente
                </label>
                <select name="id_tipo_docente" id="id_tipo_docente" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @foreach ($tiposDocentes as $tipoDocente)
                        <option value="{{ $tipoDocente->id_tipo_docente }}" {{ old('id_tipo_docente') == $tipoDocente->id_tipo_docente ? 'selected' : '' }}>{{ $tipoDocente->nombreTipo }}</option>
                    @endforeach
                </select>
                @error('id_tipo_docente')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="idEstadoCivil">
                    Estado Civil
                </label>
                <select name="idEstadoCivil" id="idEstadoCivil" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @foreach ($estadosCiviles as $estadoCivil)
                        <option value="{{ $estadoCivil->idEstadoCivil }}" {{ old('idEstadoCivil') == $estadoCivil->idEstadoCivil ? 'selected' : '' }}>{{ $estadoCivil->nombreEstadoCivil }}</option>
                    @endforeach
                </select>
                @error('idEstadoCivil')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                <a href="{{ route('docentes.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
