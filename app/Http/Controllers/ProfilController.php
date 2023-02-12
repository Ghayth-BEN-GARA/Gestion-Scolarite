<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use App\Models\ReseauSocial;
    use App\Models\User;

    class ProfilController extends Controller{
        public function ouvrirProfilConnecte(){
            $reseaux_sociaux = $this->getReseauxSociauxUserConnected(auth()->user()->getIdUserAttribute());
            return view("Profil.profil", compact("reseaux_sociaux"));
        }

        public function getReseauxSociauxUserConnected($id_user){
            return ReseauSocial::where("id_user", "=", $id_user)->first();
        }

        public function gestionModifierInformations(Request $request){
            if(!$this->validerNumeroMobileLength($request->mobile)){
                return back()->with("erreur", "Votre numéro mobile doit comporter 8 chiffres.");
            }

            else if($this->verifierNumeroMobileExist(auth()->user()->getEmailUserAttribute(), $request->mobile)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que ce numéro de mobile est utilisé par un autre utilisateur.");
            }

            else if($this->updateInformationsUser(auth()->user()->getEmailUserAttribute(), $request->nom, $request->prenom, $request->date_naissance, $request->genre, $request->mobile, $request->travail, $request->adresse)){
                return back()->with("succes", "Nous sommes très heureux de vous informer que vos informations personnelles ont été modifiées avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier vos informations personnelles pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function validerNumeroMobileLength($numero){
            return Str::length($numero) == 8;
        }

        public function verifierNumeroMobileExist($email, $numero){
            return User::where("email", "<>", $email)->where("mobile", "=", $numero)->exists();
        }

        public function updateInformationsUser($email, $nom, $prenom, $date_naissance, $genre, $mobile, $travail, $adresse){
            return User::where("email", "=", $email)->update([
                "nom" => $nom,
                "prenom" => $prenom,
                "date_naissance" => $date_naissance,
                "genre" => $genre,
                "mobile" => $mobile,
                "travail" => $travail,
                "adresse" => $adresse
            ]);
        }

        public function gestionModifierReseauxSociaux(Request $request){
            if($this->updateReseauxSociaux(auth()->user()->getIdUserAttribute(), $request->facebook, $request->instagram, $request->linkedin, $request->github)){
                return back()->with("succes", "Nous sommes très heureux de vous informer que les liens des réseaux sociaux ont été modifiées avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier les liens des réseaux sociaux personnelles pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function updateReseauxSociaux($id_user, $facebook, $instagram, $linkedin, $github){
            return ReseauSocial::where("id_user", "=", $id_user)->update([
                "link_facebook" => $facebook,
                "link_instagram" => $instagram,
                "link_linkedin" => $linkedin,
                "link_github" => $github
            ]);
        }
    }
?>
