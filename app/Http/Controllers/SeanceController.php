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
            if($this->verifierSeanceCreerExiste($request->cours_seance, $request->date_seance, $request->heure_debut_seance, $request->heure_fin_seance)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre séance qui est déjà créée en ce jour et ce créneau horaire.");
            }

            else if($this->verifierSeanceCreerSalleNonDisponibleExiste($request->date_seance, $request->heure_debut_seance, $request->heure_fin_seance, $request->salle_seance)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que la salle n'est pas disponible dans ce jour et ce créneau horaire.");
            }

            else if($this->creerSeance($request->cours_seance, $request->salle_seance, $request->date_seance, $request->heure_debut_seance, $request->heure_fin_seance)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette nouvelle séance a été créée avec succès.");
            }

            else{
                return back()->with("error", "Pour des raisons techniques, vous ne pouvez pas créer cette nouvelle séance pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierSeanceCreerExiste($cours, $date, $debut, $fin){
            return Seance::where("id_cours", "=", $cours)
            ->where("date_seance", "=", $date)
            ->where("heure_debut_seance", "=", $debut)
            ->where("heure_fin_seance", "=", $fin)
            ->exists();
        }

        public function verifierSeanceCreerSalleNonDisponibleExiste($date, $debut, $fin, $salle){
            return Seance::where("date_seance", "=", $date)
            ->where("heure_debut_seance", "=", $debut)
            ->where("heure_fin_seance", "=", $fin) 
            ->where("id_salle", "=", $salle)
            ->exists();
        }

        public function creerSeance($cours, $salle, $date, $debut, $fin){
            $seance = new Seance();
            $seance->setDateSeanceAttribute($date);
            $seance->setHeureDebutSeanceAttribute($debut);
            $seance->setHeureFinSeanceAttribute($fin);
            $seance->setIdSalleAttribute($salle);
            $seance->setIdCoursAttribute($cours);
            return $seance->save();
        }
    }
?>
