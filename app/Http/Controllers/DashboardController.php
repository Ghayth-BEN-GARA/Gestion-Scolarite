<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\AnneeUniversitaire;

    class DashboardController extends Controller{
        public function ouvrirDashboardAdmin(){
            return view("Dashboards.dashboard_admin");
        }

        public function ouvrirDashboardComptable(){
            return view("Dashboards.dashboard_comptable");
        }

        public function ouvrirDashboardEnseignant(){
            return view("Dashboards.dashboard_enseignant");
        }

        public function ouvrirDashboardEtudiant(){
            return view("Dashboards.dashboard_etudiant");
        }

        public function ouvrirDashboardParent(){
            return view("Dashboards.dashboard_parent");
        }

        public static function getAnneeUniversitaireActuel(){
            return AnneeUniversitaire::join("annees_universitaires_actuels", "annees_universitaires.id_annee_universitaire", "=", "annees_universitaires_actuels.id_annee_universitaire")->first();
        }
    }
?>
