<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\creerMailContact;

    class FooterController extends Controller{
        public function ouvrirAide(){
            return view("Footer.help");
        }

        public function ouvrirContact(){
            return view("Footer.contact");
        }

        public function ouvrirPageEmailContact(){
            return view("Emails.email_contact");
        }

        public function gestionEnvoyerEmailContact(Request $request){
            if($this->sendMailContact($request->prenom, $request->nom, $request->sujet, $request->message, $request->email)){
                return back()->with("succes", "Nous sommes très heureux de vous informer que votre mail a été envoyé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas envoyer ce mail à l'administration. Veuillez réessayer plus tard.");
            }
        }

        public function sendMailContact($nom, $prenom, $objet, $message, $email){
            $mailData = [
                'email' => $email,
                'objet' => $objet,
                'message' => $message,
                'fullname' => $prenom." ".$nom
            ];
    
            return Mail::to("test.utilisateur012@gmail.com")->send(new creerMailContact($mailData));
        }

        public function ouvrirPageEmailCreerUser(){
            return view("Emails.email_creer_user");
        }

        public function ouvrirPageEmailInviterEtudiantsClasse(){
            return view("Emails.email_inviter_etudiants_classe");
        }
    }

