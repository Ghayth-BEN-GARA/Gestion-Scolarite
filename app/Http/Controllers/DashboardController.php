<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

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
    }
?>
