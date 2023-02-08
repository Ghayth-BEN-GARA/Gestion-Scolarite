<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class AuthentificationController extends Controller{
        public function ouvrirSignIn(){
            return view("Authentification.signin");
        }
    }
?>
