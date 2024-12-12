@extends('layouts.layout')

@section('title', 'Generar Reporte de Notas')
@section('content')
<div class="container mx-auto p-4">
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-3xl font-bold">Generar Reporte de Notas</h1>
        <form class="w-full h-full p-4" method="GET" action="{{ route('notas.pdf') }}">
            <label for="añoEscolar" class="block text-gray-700 text-sm font-bold mb-2">Año Escolar:</label>
            <select class="w-full py-2 px-4 rounded" id="añoEscolar" name="añoEscolar">
                <option value="">Seleccione un año escolar</option>
                @foreach($añosEscolares as $año)
                <option value="{{ $año->añoEscolar }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $año->añoEscolar }}</option>
                @endforeach
            </select>
            <label for="docentes" class="block text-gray-700 text-sm font-bold mb-2">Docentes:</label>
            <select class="w-full py-2 px-4 rounded" id="docentes" name="codigo_docente">
                <option value="">Seleccione un docente</option>
            </select>
            <label for="asignaturas" class="block text-gray-700 text-sm font-bold mb-2">Asignaturas:</label>
            <select class="w-full py-2 px-4 rounded" id="asignaturas" name="id_asignatura">
                <option value="">Seleccione una asignatura</option>
            </select>
            <label for="periodo" class="block text-gray-700 text-sm font-bold mb-2">Periodo:</label>
            <select class="w-full py-2 px-4 rounded" id="periodo" name="periodo">
                <option value="1" class="block text-gray-700 text-sm font-bold mb-2">Periodo 1</option>
                <option value="2" class="block text-gray-700 text-sm font-bold mb-2">Periodo 2</option>
                <option value="3" class="block text-gray-700 text-sm font-bold mb-2">Periodo 3</option>
            </select>
            <button class="bg-blue-500 text-white py-2 px-4 rounded" type="submit">Generar Reporte</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Cambiar el combo de docentes según el año escolar seleccionado
        $('#añoEscolar').change(function() {
            var añoEscolar = $(this).val();
            if (añoEscolar) {
                $.ajax({
                    url: '{{ route("docentesByAñoEscolar", "") }}/' + añoEscolar,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#docentes').empty().append('<option value="">Seleccione un docente</option>');
                        $.each(data.docentes, function(index, docente) {
                            $('#docentes').append('<option value="' + docente.codigo_docente + '">' + docente.nombre + '</option>');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error en la solicitud AJAX: ', textStatus, errorThrown);
                    }
                });
            } else {
                $('#docentes').empty().append('<option value="">Seleccione un docente</option>');
                $('#asignaturas').empty().append('<option value="">Seleccione una asignatura</option>');
            }
        });

        // Cambiar el combo de asignaturas según el docente seleccionado
        $('#docentes').change(function() {
            var codigoDocente = $(this).val();
            if (codigoDocente) {
                $.ajax({
                    url: '{{ route("asignaturasByDocente", "") }}/' + codigoDocente,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#asignaturas').empty().append('<option value="">Seleccione una asignatura</option>');
                        $.each(data.asignaturas, function(index, asignatura) {
                            $('#asignaturas').append('<option value="' + asignatura.idAsignatura + '">' + asignatura.nombreAsignatura + '</option>');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error en la solicitud AJAX: ', textStatus, errorThrown);
                    }
                });
            } else {
                $('#asignaturas').empty().append('<option value="">Seleccione una asignatura</option>');
            }
        });
    });
</script>
@endsection