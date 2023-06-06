<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TraitementController;
use App\Models\Traitement;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PatientController::class,'home'])->name('homepage');


Route::get('/hello',[HomeController::class,'hello']);


// Route::get('/home', function () {
//     return view('Hello');
// });




// *****************************************************************************

Route::get('/patients',[PatientController::class,'patients'])->name('patientspage');
Route::get('/patients/{patient}',[PatientController::class,'Afficher'])
->name('patients.Afficher')
->where('patient','\d+');

Route::delete('/patients/{patient}',[PatientController::class,'supprimer'])
->name('patients.supprimer');

Route::get('/patients/{patient}/modifier',[PatientController::class,'modifier'])
->name('patients.modifier');

Route::put('/patients/{patient}',[PatientController::class,'update'])
->name('patients.update');

Route::get('/patients/Ajouter',[PatientController::class,'Ajouter'])->name('patients.Ajouter');
Route::post('/patients/store',[PatientController::class,'store'])->name('patients.store');


// Route::resource('patients',PatientController::class);



// ****************** Traitement Route ****************************

Route::get('/traitement',[TraitementController::class,'Traitindex'])->name('traitementpage');
Route::get('/traitements/Ajouter',[TraitementController::class,'Ajouter'])->name('traitements.Ajouter');
Route::post('/traitements/store',[TraitementController::class,'store'])->name('traitements.store');

Route::delete('/traitements/{traitement}',[TraitementController::class,'supprimer'])
->name('traitements.supprimer');

Route::get('/traitements/{traitement}/modifier',[TraitementController::class,'modifier'])
->name('traitements.modifier');

Route::put('/traitements/{traitements}',[TraitementController::class,'update'])
->name('traitements.update');

Route::get('/traitements/{traitements}/patients', [TraitementController::class,'list_patients'])->name("list_patient_for_treatment");





// ============== LOGIN ROUTE ================== ***

Route::get('/login',[LoginController::class,'loginaffich'])->name('login.affich')->middleware('guest');
Route::post('/login',[LoginController::class,'login'])->name('login')->middleware('guest');
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout')->middleware('auth');





// *****************************************************************************

Route::get('/settings',[SettingsController::class,'settings'])->name('settingspage');



// **********************    Dashboard Routes   ********************************

Route::get('/dash',[DashboardController::class,'dashboard'])->name('dashboardpage');


// *****************************************************

Route::get('/Paiement',[PaiementController::class,'index'])->name('Paiementpage');
