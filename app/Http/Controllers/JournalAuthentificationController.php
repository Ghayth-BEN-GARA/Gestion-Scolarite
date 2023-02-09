<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\JournalAuthentification;

    class JournalAuthentificationController extends Controller{
        public function ouvrirJournalAuthentification(){
            $journal = $this->getListeJournalAuthentificationUser(auth()->user()->getIdUserAttribute());
            return view("Authentification.journal_authentification", compact("journal"));
        }

        public function getListeJournalAuthentificationUser($id_user){
            return JournalAuthentification::where("id_user", '=', $id_user)->paginate(10);
        }

        public function gestionDeleteJournalAuthentification(){
            if($this->deleteJournalAuthentification(auth()->user()->getIdUserAttribute())){
                return back()->with("succes", "Nous sommes très heureux de vous informer que votre journal d'authentification a été supprimé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer votre journal d'authentification pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteJournalAuthentification($id_user){
            return JournalAuthentification::where("id_user", "=", $id_user)->delete();
        }
    }
?>
