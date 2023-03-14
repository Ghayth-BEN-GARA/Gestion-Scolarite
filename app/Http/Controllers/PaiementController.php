<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\TypePaiement;
    use App\Models\User;
    use App\Models\AnneeUniversitaire;
    use App\Models\MethodePaiement;

    class PaiementController extends Controller{
        public function ouvrirListeEtudiants(){
            return view("Paiements.liste_etudiants");
        }

        public function ouvrirPaiement(Request $request){
            $liste_types_paiements = $this->getListeTypesPaiements();
            $etudiant = $this->getInformationsEtudiants($request->input("id_user"));
            $liste_annees_universitaires = $this->getListeAnneesUniversitaires();
            $liste_methodes_paiement = $this->getListeMethodesPaiements();
            return view("Paiements.paiement", compact("liste_types_paiements", "etudiant", "liste_annees_universitaires", "liste_methodes_paiement"));
        }

        public function getListeTypesPaiements(){
            return TypePaiement::orderBy("type", "asc")->get();
        }

        public function getInformationsEtudiants($id_user){
            return User::where("id_user", "=", $id_user)->where("type_user", "=", "Etudiant")->first();
        }

        public function getListeAnneesUniversitaires(){
            return AnneeUniversitaire::orderBy("debut_annee_universitaire", "asc")->get();
        }

        public function getListeMethodesPaiements(){
            return MethodePaiement::orderBy("methode", "asc")->get();
        }
    }
?>
