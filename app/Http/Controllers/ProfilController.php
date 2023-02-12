<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class ProfilController extends Controller{
        public function ouvrirProfilConnecte(){
            return view("Profil.profil");
        }
    }
?>
