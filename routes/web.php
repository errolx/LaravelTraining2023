<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Response\ResponseController;
use App\Http\Controllers\Show\ShowController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use SheetDB\SheetDB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	$searchdept = Auth::user()->dept;
	$searchVal = $searchdept;
	//check sheetDB validity
	$sheetdb = new SheetDB('s47ie9ra0xerf');
	$response = $sheetdb->get();
	if($response == null)
	{
		$sheetdb = new SheetDB('0j8ry2s6jptn9');
		//$sheetdb = new SheetDB('s47ie9ra0xerf');
		$response = $sheetdb->get();
	}
	if($response == null)
	{
		//$sheetdb = new SheetDB('s47ie9ra0xerf');
		$sheetdb = new SheetDB('3bv3vzg90oar8');
		$response = $sheetdb->get();
	}
	if($response == null)
	{
		//$sheetdb = new SheetDB('s47ie9ra0xerf');
		$sheetdb = new SheetDB('vnukdyvyhfn2b');
	}		
	//check sheetDB validity

	$sheets = $sheetdb->search(['dept'=>$searchdept]);
	

	return view('dashboard.index', compact('sheets','searchVal'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

	// profile
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	// users
	Route::resource('users', UserController::class);

	// contacts
	Route::resource('contacts', ContactController::class);

	// responses
	Route::resource('responses', ResponseController::class);

	Route::resource('dashboards', DashboardController::class);

});

require __DIR__.'/auth.php';
