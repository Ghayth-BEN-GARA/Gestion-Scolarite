<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Classe;
    use App\Models\AnneeUniversitaire;
    use App\Models\Specialite;
    use App\Models\Emploi;
    use App\Models\Cour;

    class EmploiController extends Controller{
        public function ouvrirListeEmplois(){
            return view("Emplois.liste_emplois");
        }

        public function ouvrirEmploi(Request $request){
            $classe = $this->getInformationsClasse($request->input("id_classe"));
            $emploi_semestre1 = $this->getEmploisclassePremiereSemestre($request->input("id_classe"));
            $emploi_semestre2 = $this->getEmploisclasseDeuxiemeSemestre($request->input("id_classe"));
            $nbr_cours = $this->getNbrCoursClasse($request->input("id_classe"));

            return view("Emplois.emploi", compact("classe", "emploi_semestre1", "emploi_semestre2", "nbr_cours"));
        }

        public function getInformationsClasse($id_classe){
            return Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("specialites", "specialites.id_specialite", "=", "classes.id_specialite")
            ->where("classes.id_classe", "=", $id_classe)
            ->orderBy("annees_universitaires.debut_annee_universitaire", "desc")
            ->first();
        }

        public function getEmploisclassePremiereSemestre($id_classe){
            return Emploi::where("semestre", "=", "Semestre 1")
            ->where("id_classe", "=", $id_classe)
            ->first();
        }

        public function getEmploisclasseDeuxiemeSemestre($id_classe){
            return Emploi::where("semestre", "=", "Semestre 2")
            ->where("id_classe", "=", $id_classe)
            ->first();
        }

        public function getNbrCoursClasse($id_classe){
            return cour::where("id_classe", "=", $id_classe)->count();
        }

        public function ouvrirListeMesEmplois(){
            return view("Emplois.liste_mes_emplois");
        }
    }
?>
