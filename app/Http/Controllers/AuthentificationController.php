<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Str;
    use App\Mail\creerMailForgetPassword;
    use Session;
    use App\Models\User;
    use App\Models\JournalAuthentification;
    use App\Models\PasswordReset;

    class AuthentificationController extends Controller{
        public function ouvrirSignIn(){
            return view("Authentification.signin");
        }

        public function gestionLoginUser(Request $request){
            if(!$this->verifierUserExist($request->email)){
                return back()->with("erreur", "Nous sommes désolés ! Nous n'avons pas trouvé votre compte.");
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
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas vous s'authentifier pour le moment. Veuillez réessayer plus tard.");
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

        public function gestionRecuperationCompte(Request $request){
            $token = $this->generateToken();
             
            if(!$this->verifierUserExist($request->email)){
                return back()->with("erreur", "Nous sommes désolés ! Nous n'avons pas trouvé votre compte.");
            }

            else if($this->sendMailLinkResetPassword($this->getInformationsUser($request->email)->getNomUserAttribute(), $this->getInformationsUser($request->email)->getPrenomUserAttribute(), $request->email, $token, $this->getInformationsUser($request->email)->getIdUserAttribute())){
                if($this->verifierPasswordResetUserExist($this->getInformationsUser($request->email)->getIdUserAttribute())){
                    $this->updatePasswordResetUser($this->getInformationsUser($request->email)->getIdUserAttribute(), $token);
                    return back()->with("link_sent", "Un email a été envoyé à l'adresse ".$request->email.". Veuillez rechercher dans votre boite de réception un e-mail de la plateforme et cliquez sur le lien inclus pour réinitialiser votre mot de passe.");
                }

                else{
                    $this->creerPasswordResetUser($this->getInformationsUser($request->email)->getIdUserAttribute(), $token);
                    return back()->with("link_sent", "Un email a été envoyé à l'adresse ".$request->email.". Veuillez rechercher dans votre boite de réception un e-mail de la plateforme et cliquez sur le lien inclus pour réinitialiser votre mot de passe.");
                }
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas récupérer votre compte pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function ouvrirPageEmailForgetPassword(){
            return view("Emails.email_forget_password");
        }

        public function sendMailLinkResetPassword($nom, $prenom, $email, $token, $id_user){
            $mailData = [
                'email' => $email,
                'fullname' => $prenom." ".$nom,
                'token' => $token,
                'id_user' => $id_user
                
            ];
    
            return Mail::to($email)->send(new creerMailForgetPassword($mailData));
        }

        public function generateToken(){
            return Str::random(64);
        }

        public function getInformationsUser($email){
            return User::where("email", "=", $email)->first();
        }

        public function creerPasswordResetUser($id_user, $token){
            $password_reset = new PasswordReset();
            $password_reset->setTokenAttribute($token);
            $password_reset->setIdUserAttribute($id_user);

            return $password_reset->save();
        }

        public function updatePasswordResetUser($id_user, $token){
            return PasswordReset::where("id_user", "=", $id_user)->update([
                "token" => $token
            ]);
        }

        public function verifierPasswordResetUserExist($id_user){
            return PasswordReset::where("id_user", "=", $id_user)->exists();
        }

        public function ouvrirResetPassword(Request $request){
            $token = $request->token;
            $id_user = $request->input('id_user');
            $verifier_token = $this->verifierTokenUser($id_user, $token);
            return view("Authentification.reset_password", compact("token", "id_user", "verifier_token"));
        }

        public function verifierTokenUser($id_user, $token){
            return PasswordReset::where("id_user", "=", $id_user)->where("token", "=", $token)->exists();
        }

        public function gestionModifierPassword(Request $request){
            if($this->verifierEgalitePassword($request->password, $request->confirm_password)){
                return back()->with("erreur", "Les deux mots de passe saisis ne sont pas identiques.");
            }

            else if($this->verifierAncienPasswordSaisie($request->id_user, $request->password)){
                return back()->with("erreur", "Vous avez saisi votre ancien mot de passe.");
            }
       
            else if($this->updatePasswordUser($request->id_user, $request->password)){
                $this->creerJournalAuthentification($request->id_user, "Réinitialisation du mot de passe", "Récupération de compte en suivant le processus de réinitialisation du mot de passe.");
                return redirect('/')->with('success', 'Nous sommes très heureux de vous informer que votre mot de passe a a été réinitialisé avec succès.');
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier votre nouveau mot de passe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierEgalitePassword($new_password, $confirm_password){
            return strcmp($new_password, $confirm_password);
        }

        public function verifierAncienPasswordSaisie($id_user, $password){
            $credentials = [
                'id_user' => $id_user,
                'password' => $password
            ];

            return Auth::attempt($credentials);
        }

        public function updatePasswordUser($id_user, $password){
            return User::where("id_user", "=", $id_user)->update([
                "password" => bcrypt($password)
            ]);
        }
    }
?>
