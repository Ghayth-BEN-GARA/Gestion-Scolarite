<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class EmploiController extends Controller{
        public function ouvrirListeEmplois(){
            return view("Emplois.liste_emplois");
        }
    }
?>
