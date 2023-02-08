<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\PagesErreursController;
    use App\Http\Controllers\DashboardController;
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
    Route::get("/dashboard-admin",[DashboardController::class,"ouvrirDashboardAdmin"])->middleware("session_user_not_exist"); 
?>
