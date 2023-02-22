<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\AnneeUniversitaire;
    use App\Models\Classe;

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

        public function gestionCreerClasse(Request $request){
            if($this->verifierClasseAnneeUniversitaireExiste($request->designation, $request->annee_universitaire)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que vous avez déjà inscrit cette classe.");
            }

            else if($this->creerClasse($request->etudiants, $request->designation, $request->annee_universitaire)){
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

        public function creerClasse($etudiants, $designation, $id_annee_universitaire){
            $classe = new Classe();
            $classe->setDesignationClasseAttribute($designation);
            $classe->setIdAnneeUniversitaireAttribute($id_annee_universitaire);
            $classe->setEtudiantClasseAttribute(implode(',', $etudiants));
            return $classe->save();
        }
    }
?>
