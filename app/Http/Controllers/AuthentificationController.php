<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Session;
    use App\Models\User;
    use App\Models\JournalAuthentification;

    class AuthentificationController extends Controller{
        public function ouvrirSignIn(){
            return view("Authentification.signin");
        }

        public function gestionLoginUser(Request $request){
            if(!$this->verifierUserExist($request->email)){
                return back()->with("erreur", "Nous sommes désolés ! Nous n'avons pas trouvé le compte.");
            }

            else if(!$this->verifierEmailPasswordValide($request->email, $request->password)){
                return back()->with("erreur", "Une erreur s'est produite lors de la tentative de connexion. Vérifier votre adresse e-mail et votre mot de passe et réessayer une autre fois.");
            }

            else if($this->creerJournalAuthentification(auth()->user()->getIdUserAttribute(), "Connexion", "Se connecter au système en entrant l'adresse e-mail et le mot de passe.")){
                $this->creerSessionUser($request->email, auth()->user()->getTypeUserAttribute());
                
                if(auth()->user()->getTypeUserAttribute() == "Admin"){
                    return redirect("/dashboard-admin");
                }

                else if(auth()->user()->getTypeUserAttribute() == "Comptable"){
                    return redirect("/dashboard-comptable");
                }

                else if(auth()->user()->getTypeUserAttribute() == "Enseignant"){
                    return redirect("/dashboard-enseignant");
                }

                else if(auth()->user()->getTypeUserAttribute() == "Etudiant"){
                    return redirect("/dashboard-etudiant");
                }

                else if(auth()->user()->getTypeUserAttribute() == "Parent"){
                    return redirect("/dashboard-parent");
                }
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas vous authentifier pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierUserExist($email){
            return User::where("email", "=", $email)->exists();
        }

        public function verifierEmailPasswordValide($email, $password){
            $credentials = request(['email', 'password']);
            return Auth::attempt($credentials);
        }

        public function creerJournalAuthentification($id_user, $title, $description){
            $journal = new JournalAuthentification();
            $journal->setTitreJournalAttribute($title);
            $journal->setDescriptionJournalAttribute($description);
            $journal->setIdUserAttribute($id_user);
            return $journal->save();
        }

        public function creerSessionUser($email, $acteur){
            Session::put('email', $email);
            Session::put('acteur', $acteur);
        }

        public function gestionLogoutUser(){
            if($this->creerJournalAuthentification(auth()->user()->getIdUserAttribute(), "Déconnexion", "Déconnexion de la session utilisateur et sortie de l'application.")){
                if($this->logoutUser()){
                    return redirect("/");
                }

                else{
                    return redirect("/404");
                }
            }

            else{
                return redirect("/404");
            }
        }

        public function logoutUser(){
            Session::forget('email');
            Session::forget('acteur');
            Session::flush();
            auth()->logout();

            if (!Session::has('email')){
                return true;
            }

            else{
                return false;
            }
        }

        public function gestionSupprimerCompte(){
            if($this->supprimerCompte()){
                if($this->logoutUser()){
                    return redirect("/")->with("deleted", "Votre compte a été supprimé avec succès aujourd'hui. Si vous pensez qu'il a été supprimé par erreur, veuillez contacter l'administration.");
                }

                else{
                    return redirect("/404"); 
                }
            }

            else {
                return redirect("/404");
            }
        }

        public function supprimerCompte(){
            return User::where("id_user", "=", auth()->user()->getIdUserAttribute())->delete();
        }

        public function ouvrirForgetPassword(){
            return view("Authentification.forget_password");
        }
    }
?>
