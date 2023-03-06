<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Module;
    use App\Models\User;
    use App\Models\Classe;
    use App\Models\AnneeUniversitaire;
    use App\Models\AnneeUniversitaireActuel;
    use App\Models\Cours;

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

        public function gestionCreerCours(Request $request){
            if($this->verifierCoursExiste($request->module, $request->enseignant, $request->classe, $request->semestre)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que vous avez déjà créé ce cours pour la classe ".$this->getInformationsClasse($request->classe)->getDesignationClasseAttribute()." .");
            }

            else if($this->creerCours($request->module, $request->enseignant, $request->classe, $request->semestre)){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce nouveau cours a été créé avec succès.");
            }   
            
            else{
                return back()->with("error", "Pour des raisons techniques, vous ne pouvez pas créer ce nouveau cours pour le moment. Veuillez réessayer plus tard.");
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
                return back()->with("error", "Pour des raisons techniques, vous ne pouvez pas supprimer ce cours pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteCours($id_cours){
            return Cours::where("id_cours", "=", $id_cours)->delete();
        }
    }
?>
