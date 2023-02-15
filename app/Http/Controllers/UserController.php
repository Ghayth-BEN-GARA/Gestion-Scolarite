<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\creerMailCreationUser;
    use App\Models\User;
    use App\Models\ReseauSocial;
    use App\Models\Compte;
    use App\Models\ConfigurationCompte;
    use App\Models\JournalAuthentification;

    class UserController extends Controller{
        public function ouvrirListeUsers(){
            return view("Users.liste_users");
        }

        public function ouvrirAddrUser(){
            return view("Users.add_user");
        }

        public function gestionCreerUser(Request $request){
            if($this->verifierAdresseEmailExist($request->email)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que cette adresse email est utilisée par un autre utilisateur.");
            }

            else if(!$this->validerNumeroMobileLength($request->numero_mobile)){
                return back()->with("erreur", "Le numéro mobile doit être composé de 8 chiffres.");
            }

            else if($this->verifierNumeroMobileExist($request->numero_mobile)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que ce numéro mobile est utilisé par un autre utilisateur.");
            }

            else if($this->verifierEgalitePassword($request->password, $request->confirm_password)){
                return back()->with("erreur", "Les deux mots de passe saisis ne sont pas identiques.");
            }

            else{
                $this->creerNouvelUser($request->nom, $request->prenom, $request->email, $request->password, $request->adresse, $request->date_naissance, $request->genre, $request->numero_mobile, $request->role, $request->travail);
                $this->creerReseauxSociauxNouvelUser($this->getIdUserAttribute($request->email));
                $this->creerCompteNouvelUser($this->getIdUserAttribute($request->email));
                $this->creerConfigurationCompteNouvelUser($this->getIdUserAttribute($request->email));
                $this->creerJournalAuthentificationNouvelUser($this->getIdUserAttribute($request->email));

                if($this->sendMailCreationNouvelUser($request->nom, $request->prenom, $request->email, $request->password, $request->role)){
                    return back()->with("success", "Nous sommes très heureux de vous informer que cet nouvel utilisateur a été créé avec succès.");
                }

                else{
                    return back()->with("error", "Pour des raisons techniques, vous ne pouvez pas créer cet nouvel utilisateur pour le moment. Veuillez réessayer plus tard.");
                }
            }
        }

        public function verifierAdresseEmailExist($email){
            return User::where("email", "=", $email)->exists();
        }

        public function validerNumeroMobileLength($numero){
            return Str::length($numero) == 8;
        }

        public function verifierNumeroMobileExist($numero){
            return User::where("mobile", "=", $numero)->exists();
        }

        public function verifierEgalitePassword($password, $confirm_password){
            return strcmp($password, $confirm_password);
        }

        public function creerNouvelUser($nom, $prenom, $email, $password, $adresse, $naissance, $genre, $mobile, $type, $travail){
            $user = new User();
            $user->setNomUserAttribute($nom);
            $user->setPrenomUserAttribute($prenom);
            $user->setEmailUserAttribute($email);
            $user->setPasswordUserAttribute(bcrypt($password));
            $user->setAdresseUserAttribute($adresse);
            $user->setDateNaissanceUserAttribute($naissance);
            $user->setGenreUserAttribute($genre);
            $user->setMobileUserAttribute($mobile);
            $user->setTypeUserAttribute($type);
            $user->setTravailUserAttribute($travail);

            return $user->save();
        }

        public function creerReseauxSociauxNouvelUser($id_user){
            $reseau_social = new ReseauSocial();
            $reseau_social->setIdUserAttribute($id_user);

            return $reseau_social->save();
        }

        public function getIdUserAttribute($email){
            return User::where("email", "=", $email)->first()->getIdUserAttribute();
        }

        public function creerCompteNouvelUser($id_user){
            $compte = new Compte();
            $compte->setStatusCompteAttribute("Activé");
            $compte->setIdUserAttribute($id_user);

            return $compte->save();
        }

        public function creerConfigurationCompteNouvelUser($id_user){
            $configuration = new ConfigurationCompte();
            $configuration->setIdUserAttribute($id_user);
            
            return $configuration->save();
        }

        public function creerJournalAuthentificationNouvelUser($id_user){
            $journal = new JournalAuthentification();
            $journal->setTitreJournalAttribute("Inscription");
            $journal->setDescriptionJournalAttribute("S'inscrire dans le système en saisissant les informations requises.");
            $journal->setIdUserAttribute($id_user);

            return $journal->save();
        }

        public function sendMailCreationNouvelUser($nom, $prenom, $email, $password, $type){
            $mailData = [
                'email' => $email,
                'password' => $password,
                'type' => $type,
                'fullname' => $prenom." ".$nom
            ];
    
            return Mail::to($email)->send(new creerMailCreationUser($mailData));
        }

        public function ouvrirUser(Request $request){
            $user = $this->getInformationsUser($request->input("id_user"));

            return view("Users.user", compact("user"));
        }

        public function getInformationsUser($id_user){
            return User::join("reseaux_sociaux", "reseaux_sociaux.id_user", "=", "users.id_user")
            ->where("users.id_user", "=", $id_user)
            ->first();
        }
    }
?> 
