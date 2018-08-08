<?php

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

Route::get('/','HomeController@index');
Route::post('home/upload','HomeController@upload');

Route::get('home/getPeople','HomeController@getPeople');

Route::get('test-add', function () {
    $task = new \TodoList\Entities\Task('Make test app', 'Create the test application for the Sitepoint article.');

    \EntityManager::persist($task);
    \EntityManager::flush();

    return 'added!';
});