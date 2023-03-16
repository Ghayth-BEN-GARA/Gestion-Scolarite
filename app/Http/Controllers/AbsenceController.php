<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Cours;
    use App\Models\Classe;
    use App\Models\AnneeUniversitaire;
    use App\Models\AnneeUniversitaireActuel;
    use App\Models\Seance;
    use App\Models\Module;
    use App\Models\User;

    class AbsenceController extends Controller{
        public function ouvrirAbsencesSeance(Request $request){
            $seance = $this->getInformationsSeanceEnseignantAnneeUniversitaireActuel(auth()->user()->getIdUserAttribute(), $request->input("id_seance"));
            return view("Absences.absences_seance", compact("seance"));
        }

        public function getInformationsSeanceEnseignantAnneeUniversitaireActuel($id_enseignant, $id_seance){
            return Cours::join("classes", "classes.id_classe", "=", "cours.id_classe")
            ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "annees_universitaires.id_annee_universitaire")
            ->join("seances", "seances.id_cours", "cours.id_cours")
            ->join("modules", "modules.id_module", "=", "cours.id_module")
            ->join("users", "users.id_user", "=", "cours.id_enseignant")
            ->where("cours.id_enseignant", "=", $id_enseignant)
            ->where("seances.id_seance", "=", $id_seance)
            ->first();
        }
    }
?>
