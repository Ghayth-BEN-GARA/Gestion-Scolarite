<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Cours;
    use App\Models\Classe;
    use App\Models\Seance;
    use App\Models\AnneeUniversitaire;
    use App\Models\AnneeUniversitaireActuel;
    use App\Models\Module;
    use App\Models\Salle;

    class SeanceController extends Controller{
        public function ouvrirListeSeances(){
            return view("Seances.liste_seances");
        }

        public function ouvrirAddSeance(){
            $liste_cours = $this->getListeCoursAnneeUniversitaireActuel();
            $liste_salles = $this->getListeSalles();
            return view("Seances.add_seance", compact("liste_cours", "liste_salles"));
        }

        public function getListeCoursAnneeUniversitaireActuel(){
            return Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "annees_universitaires.id_annee_universitaire")
            ->join("cours", "cours.id_classe", "=", "classes.id_classe")
            ->join("modules", "modules.id_module", "=", "cours.id_module")
            ->orderBy("modules.nom_module", "asc")
            ->get();
        }

        public function getListeSalles(){
            return Salle::orderBy("numero_salle", "asc")
            ->get();
        }

        public function gestionCreerSeance(Request $request){
            # code...
        }
    }
?>
