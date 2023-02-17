<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\PagesErreursController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\JournalAuthentificationController;
    use App\Http\Controllers\ConfigurationCompteController;
    use App\Http\Controllers\CompteController;
    use App\Http\Controllers\FooterController;
    use App\Http\Controllers\ProfilController;
    use App\Http\Controllers\UserController;
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
    Route::get("/update-type-mode-configuration",[ConfigurationCompteController::class,"modificationModeConfiguration"]);
    Route::get("/update-status-compte",[CompteController::class,"modificationStatusCompte"]);
    Route::get("/delete-compte",[AuthentificationController::class,"gestionSupprimerCompte"]);
    Route::get("/aide",[FooterController::class,"ouvrirAide"])->middleware("session_user_not_exist");
    Route::get("/contact",[FooterController::class,"ouvrirContact"])->middleware("session_user_not_exist");
    Route::get("/page-email-contact",[FooterController::class,"ouvrirPageEmailContact"])->middleware("session_user_not_exist");
    Route::post("/envoyer-email-contact",[FooterController::class,"gestionEnvoyerEmailContact"]);
    Route::get("/profil",[ProfilController::class,"ouvrirProfilConnecte"])->middleware("session_user_not_exist");
    Route::post("/modifier-informations-profil",[ProfilController::class,"gestionModifierInformations"]);
    Route::post("/modifier-reseaux-sociaux-profil",[ProfilController::class,"gestionModifierReseauxSociaux"]);
    Route::post("/modifier-password-profil",[ProfilController::class,"gestionModifierPassword"]);
    Route::get("/edit-photo-profil",[ProfilController::class,"ouvrirPhotoDeProfil"])->middleware("session_user_not_exist");
    Route::post("/modifier-photo-profil",[ProfilController::class,"gestionModifierPhotoProfil"]);
    Route::get("/liste-users",[UserController::class,"ouvrirListeUsers"])->middleware("session_user_not_exist_admin");
    Route::get("/add-user",[UserController::class,"ouvrirAddrUser"])->middleware("session_user_not_exist_admin");
    Route::post("/creer-user",[UserController::class,"gestionCreerUser"]);
    Route::get("/page-email-creer-user",[FooterController::class,"ouvrirPageEmailCreerUser"])->middleware("session_user_not_exist");
    Route::get("/user",[UserController::class,"ouvrirUser"])->middleware("session_user_not_exist");
    Route::get("/edit-user",[UserController::class,"ouvrirEditUser"])->middleware("session_user_not_exist_admin");
    Route::post("/modifier-user",[UserController::class,"gestionModifierUser"]);
    Route::get("/delete-user",[UserController::class,"gestionSupprimerUser"]);
    Route::get("/forget-password",[AuthentificationController::class,"ouvrirForgetPassword"])->middleware("session_user_exist");
    Route::post("/recuperation-compte",[AuthentificationController::class,"gestionRecuperationCompte"]);   
    Route::get("/page-email-forget-password",[AuthentificationController::class,"ouvrirPageEmailForgetPassword"])->middleware("session_user_exist");
    Route::get("/reset-password",[AuthentificationController::class,"ouvrirResetPassword"])->middleware("session_user_exist");
?>
