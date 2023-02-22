<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\AnneeUniversitaire;

    class ClasseController extends Controller{
        public function ouvrirListeClasses(){
            return view("Classes.liste_classes");
        }

        public function ouvrirAddClasse(){
            $liste_etudiants = $this->getListeEtudiants();
            $liste_annees_universitaire = $this->getListeAnneeUniversite();
            return view("Classes.add_classe", compact("liste_etudiants", "liste_annees_universitaire"));
        }

        public function getListeEtudiants(){
            return User::where("type_user", "=", "Etudiant")->get();
        }

        public function getListeAnneeUniversite(){
            return AnneeUniversitaire::get();
        }
    }
?>
