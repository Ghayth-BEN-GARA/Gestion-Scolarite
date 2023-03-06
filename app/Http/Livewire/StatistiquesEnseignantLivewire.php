<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Carbon\Carbon;
    use App\Models\Classe;
    use App\Models\AnneeUniversitaireActuel;
    use App\Models\AnneeUniversitaire;
    use App\Models\Cours;

    class StatistiquesEnseignantLivewire extends Component{
        public function render(){
            return view('livewire.statistiques-enseignant-livewire');
        }

        public function getMesClassesAnneeUniversitaireActuel(){
            $classes = Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "annees_universitaires.id_annee_universitaire")
            ->join("cours", "cours.id_classe", "=", "classes.id_classe")
            ->distinct()
            ->where("cours.id_enseignant", "=", auth()->user()->getIdUserAttribute())
            ->count("classes.id_classe");

            if(is_null($classes)){
                return 0;
            }

            else{
                return $classes;
            }
        }

        public function getAnneeUniversitaireActuel(){
            return AnneeUniversitaire::join("annees_universitaires_actuels", "annees_universitaires.id_annee_universitaire", "=", "annees_universitaires_actuels.id_annee_universitaire")->first();
        }

        public function getMesCoursAnneeUniversitaireActuel(){
            $cours = Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "annees_universitaires.id_annee_universitaire")
            ->join("cours", "cours.id_classe", "=", "classes.id_classe")
            ->where("cours.id_enseignant", "=", auth()->user()->getIdUserAttribute())
            ->count();

            if(is_null($cours)){
                return 0;
            }

            else{
                return $cours;
            }
        }
    }
?>
