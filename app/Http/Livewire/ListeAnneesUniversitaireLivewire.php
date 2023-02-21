<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\AnneeUniversitaire;

    class ListeAnneesUniversitaireLivewire extends Component{
        public $search_annees_universitaire;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-annees-universitaire-livewire', [
    		    'liste_annees' => AnneeUniversitaire::where([
                    ['debut_annee_universitaire', 'like', '%'.$this->search_annees_universitaire.'%'],
                ])

                ->orWhere([
                    ['fin_annee_universitaire', 'like', '%'.$this->search_annees_universitaire.'%'],
                ])

                ->orderBy('debut_annee_universitaire', 'asc')
                ->paginate(10,array('annees_universitaires.*'))
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
