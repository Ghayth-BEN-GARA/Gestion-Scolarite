<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class SalleController extends Controller{
        public function ouvrirListeSalles(){
            return view("Salles.liste_salles");
        }
    }
?>
