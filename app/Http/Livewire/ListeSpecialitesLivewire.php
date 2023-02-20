<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\Specialite;

    class ListeSpecialitesLivewire extends Component{
        public $search_specialites;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-specialites-livewire', [
                'specialites' => Specialite::where("nom_specialite", "like", "%".$this->search_specialites."%")
                ->orderBy("nom_specialite", "asc")
                ->paginate(10, array("specialites.*"))
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