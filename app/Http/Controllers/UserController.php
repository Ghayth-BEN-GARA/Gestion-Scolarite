<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class UserController extends Controller{
        public function ouvrirListeUsers(){
            return view("Users.liste_users");
        }
    }
?> 
