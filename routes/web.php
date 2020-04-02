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

/* Ajax Todolist */
Route::post('/selectedtodolist', 'SelectedlistController')->name('selectedtodolist');

/* Ajax indicateur Notifications */
Route::get('/notifications-push', 'NotificationspushController@notifpush')->name('notifications-push');

/* Ajax liste notifications demande d'amis */
Route::get('/notifications', 'NotificationspushController@notifications')->name('notifications');

/* Ajax liste notifications partage de todolist */
Route::get('/notifications-todolist', 'NotificationspushController@notifications_todolist')->name('notifications-todolist');

/*Création de la liste todolists*/
Route::get('/todolist', 'TodolistController@todolist')->name('todolist');

/*Création des sharedtodolists*/
Route::get('/sharedtodolist', 'SharedtodolistController@sharedtodolist')->name('sharedtodolist');

/* Ajax amis */
Route::get('/list_amis', 'TodolistController@amis')->name('list_amis');

/* Update tasks */
Route::post('/update_tasks', 'TaskController@update')->name('update_tasks');

/* Delete tasks */
Route::post('/delete_task', 'TaskController@delete')->name('delete_task');

/* Delete toute les taches */
Route::post('/delete_tasks', 'TaskController@delete_tasks')->name('delete_tasks');

/* Accepter toute les taches */
Route::post('/validate_tasks', 'TaskController@validate_tasks')->name('validate_tasks');

/* Create tasks */
Route::post('/create_task', 'TaskController@create')->name('create_tasks');

/* Delete todolist */
Route::post('/delete_todo', 'TodolistController@destroy')->name('delete_tasks');

/* Accepter et refuser demandes d'amis */
Route::post('/accepterAmi', 'AmisController@accepter')->name('accepterAmi');
Route::post('/refuserAmi', 'AmisController@refuser')->name('refuserAmi');

/* Accepter et refuser demandes de partage */
Route::post('/accepterShared', 'SharedtodoListController@accepter')->name('accepterShared');
Route::post('/refuserShared', 'SharedtodoListController@refuser')->name('refuserShared');

/* Ajax supprimer amis */
Route::post('/Delete_friend', 'AmisController@delete_friend')->name('Delete_friend');

/*Changer Nom de la todolist*/
Route::post('/Changernametodolist', 'TodolistController@changer_nom')->name('Changernametodolist');
/* Auth */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/Todolist', 'TodoListController');
    Route::resource('/Amis', 'AmisController');
    Route::resource('/Sharedtodolist', 'SharedtodoListController');
    Route::resource('/Profil', 'ProfilController');
    Route::post('/update', 'ProfilController@update')->name('profil.update');
    /* Changer photo de profil */
    Route::post('/Profil', 'ProfilController@update_avatar')->name('Profil.update_avatar');
});
Route::resource('/Contact', 'FormulaireController');


