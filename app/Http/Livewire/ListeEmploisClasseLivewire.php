<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\Classe;
    use App\Models\AnneeUniversitaire;
    use App\Models\Specialite;

    class ListeEmploisClasseLivewire extends Component{
        public $search_classes;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-emplois-classe-livewire', [
                "classes" => Classe::where([
                    ["designation_classe", "like", "%".$this->search_classes."%"],
                ])

                ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
                ->join("specialites", "specialites.id_specialite", "=", "classes.id_specialite")
                ->orderBy("annees_universitaires.debut_annee_universitaire", "desc")
                ->paginate(10, array("classes.*", "annees_universitaires.*", "specialites.*"))
            ]);
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }
    }
?>
