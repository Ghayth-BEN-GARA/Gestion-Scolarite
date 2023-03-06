<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\Classe;
    use App\Models\User;
    use App\Models\Cours;
    use App\Models\Module;
    use App\Models\AnneeUniversitaire;

    class ListeCoursLivewire extends Component{
        public $classe = "Tout";
        public $search_cours;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            if($this->classe == "Tout"){
                return view('livewire.liste-cours-livewire', [
                    "cours" => Cours::where([
                        ["designation_classe", "like", "%".$this->search_cours."%"],
                    ])

                    ->orWhere([
                        ["nom_module", "like", "%".$this->search_cours."%"],
                    ])

                    ->orWhere([
                        ["prenom", "like", "%".$this->search_cours."%"],
                    ])

                    ->orWhere([
                        ["nom", "like", "%".$this->search_cours."%"],
                    ])

                    ->join("classes", "classes.id_classe", "=", "cours.id_classe")
                    ->join("modules", "modules.id_module", "=", "cours.id_module")
                    ->join("users", "users.id_user", "=", "cours.id_enseignant")
                    ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
                    ->orderBy("prenom", "asc")
                    ->paginate(10, array("classes.*", "modules.*", "users.*", "cours.*", "annees_universitaires.*"))
                ]);
            }

            else{
                return view('livewire.liste-cours-livewire',[
                    "cours" => Cours::where([
                        ["designation_classe", "like", "%".$this->search_cours."%"],
                        ["classes.id_classe", "like", "%".$this->classe."%"],
                    ])

                    ->orWhere([
                        ["nom_module", "like", "%".$this->search_cours."%"],
                        ["classes.id_classe", "like", "%".$this->classe."%"],
                    ])

                    ->orWhere([
                        ["prenom", "like", "%".$this->search_cours."%"],
                        ["classes.id_classe", "like", "%".$this->classe."%"],
                    ])

                    ->orWhere([
                        ["nom", "like", "%".$this->search_cours."%"],
                        ["classes.id_classe", "like", "%".$this->classe."%"],
                    ])

                    ->join("classes", "classes.id_classe", "=", "cours.id_classe")
                    ->join("modules", "modules.id_module", "=", "cours.id_module")
                    ->join("users", "users.id_user", "=", "cours.id_enseignant")
                    ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
                    ->orderBy("prenom", "asc")
                    ->paginate(10, array("classes.*", "modules.*", "users.*", "cours.*", "annees_universitaires.*"))
                ]);
            }
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }

        public function getListeClasses(){
            return Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->get();
        }
    }
?>
