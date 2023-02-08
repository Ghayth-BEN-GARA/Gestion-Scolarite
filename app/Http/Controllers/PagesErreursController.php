<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class PagesErreursController extends Controller{
        public function ouvrirPageIntrouvable(){
            return view("Errors.404");
        }
    }
?>
