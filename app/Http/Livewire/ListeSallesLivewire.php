<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\Etage;
    use App\Models\Salle;

    class ListeSallesLivewire extends Component{
        public $etage = "Tout";
        public $search_salles;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            if($this->etage == "Tout"){
                return view('livewire.liste-salles-livewire', [
                    'salles' => Salle::where([
                        ["numero_salle", "like", "%".$this->search_salles."%"],
                    ])

                    ->orderBy("id_salle", "asc")
                    ->paginate(10, array("salles.*"))
                ]);
            }

            else{
                return view('livewire.liste-salles-livewire', [
                    "salles" => Salle::where([
                        ["numero_salle", "like", "%".$this->search_salles."%"],
                        ["numero_etage", "like", "%".$this->etage."%"],
                    ])

                    ->orderBy("id_salle", "asc")
                    ->paginate(10, array("salles.*"))
                ]);
            }
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }

        public function getListeEtage(){
            return Etage::get();
        }
    }
?>
