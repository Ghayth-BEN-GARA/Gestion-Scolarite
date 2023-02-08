<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class DashboardController extends Controller{
        public function ouvrirDashboardAdmin(){
            return view("Dashboards.dashboard_admin");
        }
    }
?>
