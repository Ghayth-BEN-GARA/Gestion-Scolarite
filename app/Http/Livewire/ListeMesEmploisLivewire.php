<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\Classe;
    use App\Models\Specialite;
    use App\Models\AnneeUniversitaire;
    use App\Models\Emploi;

    class ListeMesEmploisLivewire extends Component{
        public function render(){
            return view('livewire.liste-mes-emplois-livewire');
        }

        public function getListeClasse(){
            return Classe::join("specialites","specialites.id_specialite", "=", "classes.id_specialite")
            ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->get();
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
    }
?>
