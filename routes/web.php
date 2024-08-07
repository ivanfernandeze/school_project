<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapacidadController;
use App\Http\Controllers\CatedraController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GradosController;
use App\Http\Controllers\NivelesController;
use App\Http\Controllers\ResumenXController;
use App\Http\Controllers\SeccionesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\TipoDocenteController;


use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotasController;
use App\Models\Catedra;
use App\Models\Grado;

Route::resource('/alumnos', AlumnoController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', function () {return view('welcome');})->name('welcome');
    Route::get('/dashboard', function () {return view('pages.dashboard.index');})->name('dashboard');


    Route::get('/gradosYSecciones', [ResumenXController::class, 'index'])->name('gradosYSecciones');
    Route::resource('grados', GradosController::class);
    Route::get('/api/grados/{nivelId}', [GradosController::class, 'getGradosByNivel']);
    Route::resource('niveles', NivelesController::class);
    Route::resource('secciones', SeccionesController::class);

    Route::resource('capacidades', CapacidadController::class);
    Route::resource('tiposDocentes', TipoDocenteController::class);
    Route::resource('estadosCiviles', EstadoCivilController::class);
    Route::resource('docentes', DocenteController::class);

    

    Route::get('/notas', [NotasController::class, 'index'])->name('notas.index');

});

// routes when the user is not authenticated
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);

});


Route::resource('asignaturas', AsignaturaController::class);
Route::resource('cursos', CursoController::class);
Route::delete('/cursos/{idCurso}', [CursoController::class, 'destroy'])->name('cursos.destroy');
Route::resource('capacidades', CapacidadController::class);
Route::put('capacidades/{id}', [CapacidadController::class, 'update'])->name('capacidades.update');

Route::get('/api/asignaturas/{idCurso}', [CapacidadController::class, 'getAsignaturas']);

Route::get('/get-grados-by-nivel/{nivelId}', [AsignaturaController::class, 'getGradosByNivel']);

//CATEDRAS
Route::resource('catedras', CatedraController::class);

Route::get('grados-by-nivel/{nivelId}', [CatedraController::class, 'getGradosByNivel']);
Route::get('secciones-by-grado/{gradoId}', [CatedraController::class, 'getSeccionesByGrado']);
Route::get('asignaturas-by-curso/{cursoId}', [CatedraController::class, 'getAsignaturasByCurso']);





Route::get('/alumnos/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('/alumnos/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');

Route::get('/countries', [LocationController::class, 'getCountries'])->name('countries');
Route::get('/departamentos/{countryCode}', [LocationController::class, 'getDepartments'])->name('departamentos');
Route::get('/provincias/{geonameId}', [LocationController::class, 'getProvinces'])->name('provincias');
Route::get('/distritos/{geonameId}', [LocationController::class, 'getDistricts'])->name('distritos');










