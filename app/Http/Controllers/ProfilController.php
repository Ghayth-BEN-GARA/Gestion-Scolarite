<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\ReseauSocial;

    class ProfilController extends Controller{
        public function ouvrirProfilConnecte(){
            $reseaux_sociaux = $this->getReseauxSociauxUserConnected(auth()->user()->getIdUserAttribute());
            return view("Profil.profil", compact("reseaux_sociaux"));
        }

        public function getReseauxSociauxUserConnected($id_user){
            return ReseauSocial::where("id_user", "=", $id_user)->first();
        }
    }
?>
