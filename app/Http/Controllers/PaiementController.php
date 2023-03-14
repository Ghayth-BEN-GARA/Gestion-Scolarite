<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class PaiementController extends Controller{
        public function ouvrirListeEtudiants(){
            return view("Paiements.liste_etudiants");
        }
    }
?>
