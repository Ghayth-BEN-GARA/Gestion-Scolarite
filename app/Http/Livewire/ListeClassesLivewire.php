<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\AnneeUniversitaire;
    use App\Models\Classe;
    use App\Models\Specialite;
    use App\Models\User;
    use App\Models\Cour;

    class ListeClassesLivewire extends Component{
        public $annee_universitaire = "Tout";
        public $search_classes;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            if($this->annee_universitaire == "Tout"){
                return view('livewire.liste-classes-livewire', [
                    "classes" => Classe::where([
                        ["designation_classe", "like", "%".$this->search_classes."%"],
                    ])

                    ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
                    ->join("specialites", "specialites.id_specialite", "=", "classes.id_specialite")
                    ->orderBy("id_classe", "asc")
                    ->paginate(10, array("classes.*", "annees_universitaires.*", "specialites.*"))
                ]);
            }
            
            else{
                return view('livewire.liste-classes-livewire', [
                    "classes" => Classe::where([
                        ["designation_classe", "like", "%".$this->search_classes."%"],
                        ["debut_annee_universitaire", "like", "%".$this->annee_universitaire."%"],
                    ])

                    ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
                    ->join("specialites", "specialites.id_specialite", "=", "classes.id_specialite")
                    ->orderBy("id_classe", "asc")
                    ->paginate(10, array("classes.*", "annees_universitaires.*", "specialites.*"))
                ]);
            }
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }

        public function getListeAnneeUniversitaire(){
            return AnneeUniversitaire::get();
        }

        public function getCountEtudiants($liste_etudiants){
            return count(explode(',', $liste_etudiants));
        }

        public function getInformationsEtudiants($id_user){
            return User::where("id_user", "=", $id_user)->first();
        }

        public function getNbrCoursClasse($id_classe){
            return Cour::where("id_classe", "=", $id_classe)->count();
        }
    }
?>
