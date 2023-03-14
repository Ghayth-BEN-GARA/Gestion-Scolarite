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
    use App\Http\Controllers\SalleController;
    use App\Http\Controllers\ModuleController;
    use App\Http\Controllers\SpecialiteController;
    use App\Http\Controllers\AnneeUniversitaireController;
    use App\Http\Controllers\ClasseController;
    use App\Http\Controllers\EmploiController;
    use App\Http\Controllers\CoursController;
    use App\Http\Controllers\SeanceController;
    use App\Http\Controllers\PaiementController;
    
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
    Route::post("/update-reset-password-user",[AuthentificationController::class,"gestionModifierPassword"]);
    Route::get("/liste-salles",[SalleController::class,"ouvrirListeSalles"])->middleware("session_user_not_exist_admin");
    Route::get("/add-etage",[SalleController::class,"ouvrirAddEtage"])->middleware("session_user_not_exist_admin");
    Route::post("/creer-etage",[SalleController::class,"gestionCreerEtage"]);
    Route::get("/add-salle",[SalleController::class,"ouvrirAddSalle"])->middleware("session_user_not_exist_admin");
    Route::post("/creer-salle",[SalleController::class,"gestionCreerSalle"]);
    Route::get("/delete-salle",[SalleController::class,"gestionDeleteSalle"]);
    Route::get("/edit-salle",[SalleController::class,"ouvrirEditSalle"])->middleware("session_user_not_exist_admin");
    Route::post("/modifier-salle",[SalleController::class,"gestionModifierSalle"]);
    Route::get("/liste-modules",[ModuleController::class,"ouvrirListeModules"])->middleware("session_user_not_exist_admin");
    Route::get("/add-module",[ModuleController::class,"ouvrirAddModule"])->middleware("session_user_not_exist_admin");
    Route::post("/creer-module",[ModuleController::class,"gestionCreerModule"]);
    Route::get("/module",[ModuleController::class,"ouvrirModule"])->middleware("session_user_not_exist_admin");
    Route::get("/delete-module",[ModuleController::class,"gestionDeleteModule"]);
    Route::get("/edit-module",[ModuleController::class,"ouvrirEditModule"])->middleware("session_user_not_exist_admin");
    Route::post("/modifier-module",[ModuleController::class,"gestionModifierModule"]);
    Route::get("/liste-specialites",[SpecialiteController::class,"ouvrirListeSpecialites"])->middleware("session_user_not_exist_admin");
    Route::get("/add-specialite",[SpecialiteController::class,"ouvrirAddSpecialite"])->middleware("session_user_not_exist_admin");
    Route::post("/creer-specialite",[SpecialiteController::class,"gestionCreerSpecialite"]);
    Route::get("/delete-specialite",[SpecialiteController::class,"gestionDeleteSpecialite"]);
    Route::get("/edit-specialite",[SpecialiteController::class,"ouvrirEditSpecialite"])->middleware("session_user_not_exist_admin");
    Route::post("/modifier-specialite",[SpecialiteController::class,"gestionModifierSpecialite"]);
    Route::get("/liste-annees-universitaire",[AnneeUniversitaireController::class,"ouvrirListeAnneesUniversitaire"])->middleware("session_user_not_exist_admin");
    Route::get("/add-annee-universitaire",[AnneeUniversitaireController::class,"ouvrirAddAnneeUniversitaire"])->middleware("session_user_not_exist_admin");
    Route::post("/creer-annee-universitaire",[AnneeUniversitaireController::class,"gestionCreerAnneeUniversitaire"]);
    Route::get("/annee-universitaire",[AnneeUniversitaireController::class,"ouvrirAnneeUniversitaire"])->middleware("session_user_not_exist_admin");
    Route::get("/delete-annee-universitaire",[AnneeUniversitaireController::class,"gestionDeleteAnneeUniversitaire"]);
    Route::get("/edit-annee-universitaire",[AnneeUniversitaireController::class,"ouvrirEditAnneeUniversitaire"])->middleware("session_user_not_exist_admin");
    Route::post("/modifier-annee-universitaire",[AnneeUniversitaireController::class,"gestionModifierAnneeUniversitaire"]);
    Route::get("/liste-classes",[ClasseController::class,"ouvrirListeClasses"])->middleware("session_user_not_exist_admin");
    Route::get("/add-classe",[ClasseController::class,"ouvrirAddClasse"])->middleware("session_user_not_exist_admin");
    Route::post("/creer-classe",[ClasseController::class,"gestionCreerClasse"]);
    Route::get("/delete-classe",[ClasseController::class,"gestionDeleteClasse"]);
    Route::get("/classe",[ClasseController::class,"ouvrirClasse"])->middleware("session_user_not_exist_admin");
    Route::get("/delete-etudiant-classe",[ClasseController::class,"gestionDeleteEtudiantDeClasse"]);
    Route::get("/inviter-etudiant-classe",[ClasseController::class,"gestionInviterEtudiantDeClasse"]);
    Route::get("/page-email-inviter-etudiants-classe",[FooterController::class,"ouvrirPageEmailInviterEtudiantsClasse"])->middleware("session_user_not_exist_admin");
    Route::get("/edit-classe",[ClasseController::class,"ouvrirEditClasse"])->middleware("session_user_not_exist_admin");
    Route::post("/modifier-classe",[ClasseController::class,"gestionModifierClasse"]);
    Route::get("/edit-annee-universitaire-actuel",[AnneeUniversitaireController::class,"ouvrirEditAnneeUniversitaireActuel"])->middleware("session_user_not_exist_admin");
    Route::post("/modifier-annee-universitaire-actuel",[AnneeUniversitaireController::class,"gestionModifierAnneeUniversitaireActuel"]);
    Route::get("/envoie-emploi-classe",[ClasseController::class,"ouvrirEnvoieEmploiClasse"])->middleware("session_user_not_exist_admin");
    Route::post("/envoyer-emploi-classe",[ClasseController::class,"gestionEnvoyerEmploi"]);
    Route::get("/liste-emplois",[EmploiController::class,"ouvrirListeEmplois"])->middleware("session_user_not_exist_admin");
    Route::get("/emploi",[EmploiController::class,"ouvrirEmploi"])->middleware("session_user_not_exist_admin");
    Route::get("/liste-mes-emplois",[EmploiController::class,"ouvrirListeMesEmplois"])->middleware("session_user_not_exist_etudiant");
    Route::get("/liste-cours",[CoursController::class,"ouvrirListeCours"])->middleware("session_user_not_exist_admin");
    Route::get("/add-cours",[CoursController::class,"ouvrirAddCours"])->middleware("session_user_not_exist_admin");
    Route::post("/creer-cours",[CoursController::class,"gestionCreerCours"]);
    Route::get("/delete-cours",[CoursController::class,"gestionDeleteCours"]);
    Route::get("/edit-cours",[CoursController::class,"ouvrirEditCours"])->middleware("session_user_not_exist_admin");
    Route::post("/modifier-cours",[CoursController::class,"gestionModifierCours"]);
    Route::get("/liste-mes-cours-enseignants",[CoursController::class,"ouvrirListeMesCoursEnseignats"])->middleware("session_user_not_exist_enseignant");
    Route::get("/liste-seances",[SeanceController::class,"ouvrirListeSeances"])->middleware("session_user_not_exist_admin");
    Route::get("/add-seance",[SeanceController::class,"ouvrirAddSeance"])->middleware("session_user_not_exist_admin");
    Route::post("/creer-seance",[SeanceController::class,"gestionCreerSeance"]);
    Route::get("/delete-seance",[SeanceController::class,"gestionDeleteSeance"]);
    Route::get("/edit-seance",[SeanceController::class,"ouvrirEditSeance"])->middleware("session_user_not_exist_admin");
    Route::post("/modifier-seance",[SeanceController::class,"gestionModifierSeance"]);
    Route::get("/cours",[CoursController::class,"ouvrirCours"])->middleware("session_user_not_exist_admin");
    Route::get("/informations-classe",[ClasseController::class,"ouvrirInformationsClasse"])->middleware("session_user_not_exist_enseignant");
    Route::get("/seance",[SeanceController::class,"ouvrirSeance"])->middleware("session_user_not_exist_admin");
    Route::get("/mon-planning-enseignant",[CoursController::class,"ouvrirMonPlanningEnseignant"])->middleware("session_user_not_exist_enseignant");
    Route::get("/add-seance-enseignant",[SeanceController::class,"ouvrirAddSeanceEnseignant"])->middleware("session_user_not_exist_enseignant");
    Route::get("/liste-etudiants",[PaiementController::class,"ouvrirListeEtudiants"])->middleware("session_user_not_exist_comptable");
    Route::get("/paiement",[PaiementController::class,"ouvrirPaiement"])->middleware("session_user_not_exist_comptable");
?>
