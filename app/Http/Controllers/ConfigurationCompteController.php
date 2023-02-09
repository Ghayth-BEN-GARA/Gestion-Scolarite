<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\ConfigurationCompte;

    class ConfigurationCompteController extends Controller{
        public static function getConfigurationCompteUser(){
            return ConfigurationCompte::where("id_user", "=", auth()->user()->getIdUserAttribute())->first();
        }
    }
?>
