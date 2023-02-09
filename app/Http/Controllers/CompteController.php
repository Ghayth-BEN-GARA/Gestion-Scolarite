<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Compte;

    class CompteController extends Controller{
        public static function getCompteUser(){
            return Compte::where("id_user", "=", auth()->user()->getIdUserAttribute())->first();
        }
    }
?>
