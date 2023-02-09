<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\PagesErreursController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\JournalAuthentificationController;
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

    Route::get("/",[AuthentificationController::class,"ouvrirSignIn"])->middleware("session_user_exist");  
    Route::get("/404",[PagesErreursController::class,"ouvrirPageIntrouvable"]);
    Route::post("/login-user",[AuthentificationController::class,"gestionLoginUser"]);
    Route::get("/dashboard-admin",[DashboardController::class,"ouvrirDashboardAdmin"])->middleware("session_user_not_exist_admin");
    Route::get("/logout",[AuthentificationController::class,"gestionLogoutUser"]);
    Route::get("/journal-authentification",[JournalAuthentificationController::class,"ouvrirJournalAuthentification"])->middleware("session_user_not_exist");
    Route::get("/dashboard-comptable",[DashboardController::class,"ouvrirDashboardComptable"])->middleware("session_user_not_exist_comptable");
    Route::get("/dashboard-enseignant",[DashboardController::class,"ouvrirDashboardEnseignant"])->middleware("session_user_not_exist_enseignant");
    Route::get("/dashboard-etudiant",[DashboardController::class,"ouvrirDashboardEtudiant"])->middleware("session_user_not_exist_etudiant");
    Route::get("/dashboard-parent",[DashboardController::class,"ouvrirDashboardParent"])->middleware("session_user_not_exist_parent");
    Route::get("/delete-journal-authentification",[JournalAuthentificationController::class,"gestionDeleteJournalAuthentification"]);
?>
