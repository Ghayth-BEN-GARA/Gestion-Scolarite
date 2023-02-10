<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class FooterController extends Controller{
        public function ouvrirAide(){
            return view("Footer.help");
        }

        public function ouvrirContact(){
            return view("Footer.contact");
        }
    }

