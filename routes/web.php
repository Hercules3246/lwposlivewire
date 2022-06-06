<?php

use App\Http\Controllers\ExportController;
use App\Http\Livewire\AsignarController;
use App\Http\Livewire\CashoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoriesController;
use App\Http\Livewire\CoinsController;
use App\Http\Livewire\DashController;
use App\Http\Livewire\PasswordController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\PosController;
use App\Http\Livewire\ProductController;
use App\Http\Livewire\ProfileController;
use App\Http\Livewire\ReportsController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\UsersController;


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
    return view('auth.login');
});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', DashController::class);

Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/categories', CategoriesController::class);
Route::get('/products', ProductController::class);
Route::get('/coins', CoinsController::class);
Route::get('/pos', PosController::class);

Route::group(['middleware' => ['role:SUPER']], function () {
Route::get('/roles', RolesController::class);
Route::get('/permisos', PermisosController::class);
Route::get('/asignar', AsignarController::class);

});
Route::get('/users', UsersController::class);
Route::get('/cashout', CashoutController::class);
Route::get('/reports', ReportsController::class);
//reportes PDF
Route::get('/report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
Route::get('/report/pdf/{user}/{type}', [ExportController::class, 'reportPDF']);
//reportes EXCEL
Route::get('/report/excel/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reporteExcel']);
Route::get('/report/excel/{user}/{type}', [ExportController::class, 'reporteExcel']);
Route::get('/profile', ProfileController::class);
Route::get('/password', PasswordController::class);



});

