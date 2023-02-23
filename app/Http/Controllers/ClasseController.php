<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\AnneeUniversitaire;
    use App\Models\Classe;
    use App\Models\Specialite;

    class ClasseController extends Controller{
        public function ouvrirListeClasses(){
            return view("Classes.liste_classes");
        }

        public function ouvrirAddClasse(){
            $liste_etudiants = $this->getListeEtudiants();
            $liste_annees_universitaire = $this->getListeAnneeUniversite();
            $liste_specialite = $this->getListeSpecialite();
            return view("Classes.add_classe", compact("liste_etudiants", "liste_annees_universitaire", "liste_specialite"));
        }

        public function getListeEtudiants(){
            return User::where("type_user", "=", "Etudiant")->get();
        }

        public function getListeAnneeUniversite(){
            return AnneeUniversitaire::get();
        }

        public function getListeSpecialite(){
            return Specialite::get();
        }

        public function gestionCreerClasse(Request $request){
            if($this->verifierClasseAnneeUniversitaireExiste($request->designation, $request->annee_universitaire)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que vous avez déjà inscrit cette classe.");
            }

            else if($this->creerClasse($request->etudiants, $request->designation, $request->annee_universitaire, $request->specialite, $request->niveau)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette classe a été créé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer cette classe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierClasseAnneeUniversitaireExiste($designation, $id_annee_universitaire){
            return Classe::where("designation_classe", "=", $designation)
            ->where("id_annee_universitaire", "=", $id_annee_universitaire)
            ->exists();
        }

        public function creerClasse($etudiants, $designation, $id_annee_universitaire, $specialite, $niveau){
            $classe = new Classe();
            $classe->setDesignationClasseAttribute($designation);
            $classe->setIdAnneeUniversitaireAttribute($id_annee_universitaire);
            $classe->setEtudiantClasseAttribute(implode(',', $etudiants));
            $classe->setIdSpecialiteAttribute($specialite);
            $classe->setNiveauClasseAttribute($niveau);
            return $classe->save();
        }

        public function gestionDeleteClasse(Request $request){
            if($this->deleteclasse($request->input("id_classe"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette classe a été supprimée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer cette classe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteClasse($id_classe){
            return Classe::where("id_classe", "=", $id_classe)->delete();
        }
    }
?>
