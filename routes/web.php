<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\pagesController;
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

    return view('index');
});

Route::get('/add', [pagesController::class,'add'])->name('add');
Route::get('/view', [pagesController::class,'viewAllData'])->name('view');

Route::post('insertData', [pagesController::class,'insertData'])->name('insertData');
Route::get('editData/{pid}', [pagesController::class,'editData'])->name('editData');
Route::post('updateData/{pid}', [pagesController::class,'updateData'])->name('updateData');

Route::get('deleteData/{pid}', [pagesController::class,'deleteData'])->name('deleteData');


?>
