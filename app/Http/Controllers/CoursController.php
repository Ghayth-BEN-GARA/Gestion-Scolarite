<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Module;
    use App\Models\User;
    use App\Models\Classe;
    use App\Models\AnneeUniversitaire;
    use App\Models\AnneeUniversitaireActuel;
    use App\Models\Cours;
    use App\Models\Seance;
    use App\Models\Salle;

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
            return Module::orderBy("nom_module", "asc")->get();
        }

        public function getListeEnseignants(){
            return User::orderBy("prenom", "asc")->where("type_user", "=", "Enseignant")->get();
        }

        public function getListeClassesAnneeUniversitaireActuel(){
            return Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->orderBy("designation_classe", "asc")
            ->get();
        }

        public function gestionCreerCours(Request $request){
            if($this->verifierCoursExiste($request->module, $request->enseignant, $request->classe, $request->semestre)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que vous avez déjà créé ce cours pour la classe ".$this->getInformationsClasse($request->classe)->getDesignationClasseAttribute()." .");
            }

            else if($this->creerCours($request->module, $request->enseignant, $request->classe, $request->semestre)){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce nouveau cours a été créé avec succès.");
            }   
            
            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer ce nouveau cours pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierCoursExiste($id_module, $id_enseignant, $id_classe, $semestre){
            return Cours::where("id_module", "=", $id_module)
            ->where("id_enseignant", "=", $id_enseignant)
            ->where("id_classe", "=", $id_classe)
            ->where("semestre", "=", $semestre)
            ->exists();
        }

        public function creerCours($id_module, $id_enseignant, $id_classe, $semestre){
            $cours = new Cours();
            $cours->setIdModuleAttribute($id_module);
            $cours->setIdEnseignantAttribute($id_enseignant);
            $cours->setIdClasseAttribute($id_classe);
            $cours->setSemestreAttribute($semestre);
            return $cours->save();
        }

        public function getInformationsClasse($id_classe){
            return Classe::where("id_classe", "=", $id_classe)->first();
        }

        public function gestionDeleteCours(Request $request){
            if($this->deleteCours($request->input("id_cours"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce cours a été supprimé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer ce cours pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteCours($id_cours){
            return Cours::where("id_cours", "=", $id_cours)->delete();
        }

        public function ouvrirEditCours(Request $request){
            $cours  = $this->getInformationsCours($request->input("id_cours"));
            $liste_modules = $this->getListeModules();
            $liste_enseignants = $this->getListeEnseignants();
            $liste_classes = $this->getListeClassesAnneeUniversitaireActuel();
            return view("Cours.edit_cours", compact("liste_modules", "liste_enseignants", "liste_classes", "cours"));
        }

        public function getInformationsCours($id_cours){
            return Cours::join("users", "users.id_user", "=", "cours.id_enseignant")
            ->join("classes", "classes.id_classe", "=", "cours.id_classe")
            ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->where("id_cours", "=", $id_cours) 
            ->first();
        }

        public function gestionModifierCours(Request $request){
            if($this->verifierCoursExiste($request->id_cours, $request->module, $request->enseignant, $request->classe, $request->semestre)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que vous avez déjà créé ce cours pour la classe ".$this->getInformationsClasse($request->classe)->getDesignationClasseAttribute()." .");
            }

            else if($this->updateCours($request->id_cours, $request->module, $request->enseignant, $request->classe, $request->semestre)){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce cours a été modifié avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier ce cours pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierCoursPasActuelExist($id_cours, $id_module, $id_enseignant, $id_classe, $semestre){
            return Cours::where("id_cours", "<>", $id_cours)
            ->where("id_module", "=", $id_module)
            ->where("id_enseignant", "=", $id_enseignant)
            ->where("id_classe", "=", $id_classe)
            ->where("semestre", "=", $semestre)
            ->exists();
        }

        public function updateCours($id_cours, $id_module, $id_enseignant, $id_classe, $semestre){
            return Cours::where("id_cours", "=", $id_cours)->update([
                "id_module" => $id_module,
                "id_enseignant" => $id_enseignant,
                "id_classe" => $id_classe,
                "semestre" => $semestre
            ]);
        }

        public function ouvrirListeMesCoursEnseignats(){
            $listes_cours = $this->getListeMesCoursEnseignants(auth()->user()->getIdUserAttribute());
            return view("Cours.liste_mes_cours_enseignants", compact("listes_cours"));
        }

        public function getListeMesCoursEnseignants($id_enseignant){
            return Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "annees_universitaires.id_annee_universitaire")
            ->join("cours", "cours.id_classe", "=", "classes.id_classe")
            ->join("modules", "modules.id_module", "=", "cours.id_module")
            ->join("users", "users.id_user", "=", "cours.id_enseignant")
            ->where("cours.id_enseignant", "=", $id_enseignant)
            ->orderBy("nom_module", "asc")
            ->get();
        }

        public function ouvrirCours(Request $request){
            $cours  = $this->getToutesLesInformationsCours($request->input("id_cours"));
            $liste_seances = $this->getListeSeances($request->input("id_cours"));
            return view("Cours.cours", compact("cours", "liste_seances"));
        }

        public function getToutesLesInformationsCours($id_cours){
            return Cours::join("users", "users.id_user", "=", "cours.id_enseignant")
            ->join("classes", "classes.id_classe", "=", "cours.id_classe")
            ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("modules", "modules.id_module", "=", "cours.id_module")
            ->join("specialites", "specialites.id_specialite", "=", "classes.id_specialite")
            ->where("id_cours", "=", $id_cours) 
            ->first();
        }

        public function getListeSeances($id_cours){
            return Seance::where("id_cours", "=", $id_cours)
            ->join("salles", "salles.id_salle", "=", "seances.id_salle")
            ->orderBy("date_seance", "desc")
            ->get();
        }

        public function ouvrirMonPlanningEnseignant(Request $request){
            $events = array();
            $class_name = null;
            $date_time_debut = null;
            $date_time_fin = null;

            $planing = Cours::join("classes", "classes.id_classe", "=", "cours.id_classe")
            ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "annees_universitaires.id_annee_universitaire")
            ->join("seances", "seances.id_cours", "cours.id_cours")
            ->join("modules", "modules.id_module", "=", "cours.id_module")
            ->where("cours.id_enseignant", "=", auth()->user()->getIdUserAttribute())
            ->orderBy("seances.date_seance", "desc")
            ->get();

            foreach($planing as $data){
                if($data->date_seance < date('Y-m-d')){
                    $class_name = "bg-danger";
                }

                else if($data->date_seance == date('Y-m-d')){
                    $class_name = "bg-success";
                }

                else{
                    $class_name = "bg-secondary";
                }

                $date_time_debut = date('Y-m-d H:i',strtotime($data->date_seance." ".$data->heure_debut_seance));
                $date_time_fin = date('Y-m-d H:i',strtotime($data->date_seance." ".$data->heure_fin_seance));
                
                $events[] = [
                    "title" => $data->nom_module.": ".$data->designation_classe,
                    "start" => $date_time_debut,
                    "end" => $date_time_fin,
                    "className" => $class_name
                ];
            }
    
            return view("Cours.mon_planning_enseignant", compact("events"));
        }
    }
?>
