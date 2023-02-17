<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\File;
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
                return back()->with("erreur", "Votre numéro mobile doit être composé de 8 chiffres.");
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
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier les liens des réseaux sociaux pour le moment. Veuillez réessayer plus tard.");
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

        public function gestionModifierPassword(Request $request){
            if($this->verifierEgalitePassword($request->password, $request->confirm_password)){
                return back()->with("erreur", "Les deux mots de passe saisis ne sont pas identiques.");
            }

            else if($this->verifierAncienPasswordSaisie(auth()->user()->getEmailUserAttribute(), $request->password)){
                return back()->with("erreur", "Vous avez saisi votre ancien mot de passe.");
            }

            else if($this->updatePasswordUser(auth()->user()->getEmailUserAttribute(), $request->password)){
                return back()->with("success", "Nous sommes très heureux de vous informer que votre mot de passe a a été modifié avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier votre mot de passe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierEgalitePassword($new_password, $confirm_password){
            return strcmp($new_password, $confirm_password);
        }

        public function verifierAncienPasswordSaisie($email, $password){
            $credentials = [
                'email' => $email,
                'password' => $password
            ];

            return Auth::attempt($credentials);
        }

        public function updatePasswordUser($email, $password){
            return User::where("email", "=", $email)->update([
                "password" => bcrypt($password)
            ]);
        }

        public function ouvrirPhotoDeProfil(){
            return view("Profil.edit_photo_profil");
        }

        public function gestionModifierPhotoProfil(Request $request){
            if($this->updatePhotoProfil(auth()->user()->getIdUserAttribute(), $request)){
                return back()->with("succes", "Nous sommes très heureux de vous informer que votre photo de profil a a été modifié avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier votre photo de profil pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function updatePhotoProfil($id_user, $request){
            $filename = time().$request->file('file')->getClientOriginalName();
            $path = $request->file->move('images_profiles/'.$id_user, $filename);

            return User::where('id_user', '=', $id_user)->update([
                    'path_photo_profile' => $path
            ]);
        }
    }
?>
