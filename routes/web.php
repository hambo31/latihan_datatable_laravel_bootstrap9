<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;

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

Route::get('/edit/{id}', function(){
//Do something here
})->name('edit');

Route::get('/delete/{id}', function(){
//Do something here
})->name('delete');

Route::get('/data', function(){
    return DataTables::of(User::query())
    ->addColumn('action', function ($model){
        return '
        <a href="' . route('edit', $model->id) .'">Edit</a>
        <a href="' . route('delete', $model->id) .'">Delete</a>
        ';
    })
    ->make(true);
})->name('data');
