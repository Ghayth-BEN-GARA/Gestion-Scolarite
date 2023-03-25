<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Carbon;
    use App\Models\Cours;
    use App\Models\Classe;
    use App\Models\AnneeUniversitaire;
    use App\Models\AnneeUniversitaireActuel;
    use App\Models\Seance;
    use App\Models\Module;
    use App\Models\User;
    use App\Models\Appel;

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

        public function gestionCreerAppel(Request $request){
            if(!$this->verifierAppelExist($request->id_seance)){
                if($request->absence_collectif){
                    if($this->creerAppelAbsenceCollectif($request->id_seance, $this->getListeEtudiantsClasse($request->id_seance))){
                        return back()->with("success", "l'appel est fait en sauvegarde de l'absence collective.");
                    }

                    else{
                        return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas faire l'appel pour le moment. Veuillez réessayer plus tard.");
                    }
                }

                else if($request->absence_collectif == null){
                    if($this->creerAppel($request->id_seance, $request->select_etudiant)){
                        return back()->with("success", "l'appel est fait.");
                    }

                    else{
                        return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas faire l'appel pour le moment. Veuillez réessayer plus tard.");
                    }
                }
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas faire l'appel pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierAppelExist($id_seance){
            return Appel::where("id_seance", "=", $id_seance)->exists();
        }

        public function creerAppelAbsenceCollectif($id_seance, $lise_etudiants){
            $appel = new Appel();
            $appel->setIdSeanceAttribute($id_seance);
            $appel->setAbsenceCollectifAttribute(true);
            $appel->setListeAbsencesAttribute($lise_etudiants);
            $appel->setDateTimeAppelAttribute(Carbon\Carbon::now());

            return $appel->save();
        }

        public function getListeEtudiantsClasse($id_seance){
            return Seance::join("cours", "cours.id_cours","=", "seances.id_cours")
            ->join("classes", "classes.id_classe", "=", "cours.id_classe")
            ->where("seances.id_seance", "=", $id_seance)
            ->first()->etudiant_classe;
        }

        public function creerAppel($id_seance, $lise_etudiants){
            $appel = new Appel();
            $appel->setIdSeanceAttribute($id_seance);
            $appel->setAbsenceCollectifAttribute(false);
            $appel->setDateTimeAppelAttribute(Carbon\Carbon::now());
            $appel->setListeAbsencesAttribute(implode(',', $lise_etudiants));
            
            return $appel->save();
        }

        public function gestionDeleteAbsenceSeance(Request $request){
            $absences = $this->getListeEtudiantsAbsentsClasse($request->input("id_seance"));
            $new_absences = array();

            foreach(explode(',', $absences) as $data){
                if($data != $request->input("id_etudiant")){
                    $new_absences[] = $data;
                }
            }

            if($this->updateAppelSeance($request->input("id_seance"), $new_absences)){
                return back()->with("success_absences", "la liste des absences est modifiée.");
            }
            
            else{
                return back()->with("erreur_absences", "Pour des raisons techniques, vous ne pouvez pas modifier la liste des absences pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function getListeEtudiantsAbsentsClasse($id_seance){
            return Appel::where("id_seance", "=", $id_seance)->first()->liste_absences;
        }

        public function updateAppelSeance($id_seance, $lise_etudiants){
            return Appel::where("id_seance", "=", $id_seance)->update([
                "liste_absences" => implode(",", $lise_etudiants)
            ]);
        }

        public function ouvrirListeAbsencesCours(Request $request){
            return view("Absences.liste_absences_cours");
        }
    }
?>
