<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class ClasseController extends Controller{
        public function ouvrirListeClasses(){
            return view("Classes.liste_classes");
        }
    }
?>
