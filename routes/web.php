<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){

Route::get('/home', 'HomeController@index')->name('home');

});



Route::middleware(['auth','admin'])->group(function(){

Route::get('teachers','TeachersController@index')->name('teacher.index');

Route::get('teachers/create','TeachersController@create')->name('teacher.create');

Route::post('teachers','TeachersController@store')->name('teacher.store');

Route::get('teachers/{user}/edit','TeachersController@edit')->name('teacher.edit');

Route::put('teachers/{user}','TeachersController@update')->name('teacher.update');

Route::DELETE('teachers/{teacher}','TeachersController@destroy')->name('teacher.delete');

/*
Route::resource('teachers','TeachersController');
*/
Route::get('register/student','Auth\RegisterStudentController@showStudentRegistrationForm')->name('studentregister');

Route::post('register/student','Auth\RegisterStudentController@registerstudent');
    
});



Route::middleware(['auth','teacher'])->group(function(){

Route::resource('students','StudentsController');

Route::get('attandance','AttandanceController@index')->name('getclassdiv');

Route::post('mark-attandance','AttandanceController@attandance')->name('attandance');

Route::get('getstudents','AttandanceController@getstudents')->name('getstudents');

/*     
Route::GET('studentsclass','StudentsClassController@index')->name('students.index');   

Route::GET('studentsclass-create','StudentsClassController@create')->name('students.create');

Route::POST('studentsclass-store','StudentsClassController@store')->name('students.store');

Route::GET('studentsclass/{studentsclass}/edit','StudentsClassController@edit')->name('students.edit');

Route::PUT('studentsclass-update/{studentsclass}','StudentsClassController@update')->name('students.update');

Route::DELETE('studentsclass-delete/{studentsclass}','StudentsClassController@destroy')->name('students.delete');
*/


});

