<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::resource('sedes', 'SedeAPIController');

Route::resource('carreraProfesionals', 'Carrera_profesionalAPIController');

Route::resource('estudiantes', 'EstudianteAPIController');

Route::resource('encuestas', 'EncuestaAPIController');

Route::resource('carreraProfesioanls', 'CarreraProfesioanlAPIController');

Route::resource('carreras', 'CarreraAPIController');

Route::resource('sedes', 'SedeAPIController');

Route::resource('carreras', 'CarreraAPIController');

Route::resource('estudiantes', 'EstudianteAPIController');

Route::resource('encuestas', 'EncuestaAPIController');