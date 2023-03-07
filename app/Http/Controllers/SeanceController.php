<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class SeanceController extends Controller{
        public function ouvrirListeSeances(){
            return view("Seances.liste_seances");
        }

        public function ouvrirAddSeance(){
            return view("Seances.add_seance");
        }
    }
?>
