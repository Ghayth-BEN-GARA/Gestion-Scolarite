<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Module;
    use App\Models\User;
    use App\Models\Classe;
    use App\Models\AnneeUniversitaire;
    use App\Models\AnneeUniversitaireActuel;

    class CoursController extends Controller{
        public function ouvrirListeCours(){
            return view("Cours.liste_cours");
        }

        public function ouvrirAddCours(){
            $liste_modules = $this->getListeModules();
            $liste_enseignants = $this->getListeEnseignants();
            $liste_classes = $this->getListeClassesAnneeUniversitaireActuel();
            return view("Cours.add_cours", compact("liste_modules", "liste_enseignants", "liste_classes"));
        }

        public function getListeModules(){
            return Module::get();
        }

        public function getListeEnseignants(){
            return User::where("type_user", "=", "Enseignant")->get();
        }

        public function getListeClassesAnneeUniversitaireActuel(){
            return Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->get();
        }
    }
?>
