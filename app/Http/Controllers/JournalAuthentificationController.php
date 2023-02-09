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
    }
?>
