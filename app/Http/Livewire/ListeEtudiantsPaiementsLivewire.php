<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\User;

    class ListeEtudiantsPaiementsLivewire extends Component{
        public $search_etudiants;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-etudiants-paiements-livewire', [
                'etudiants' => User::where([
                    ["type_user", "=", "Etudiant"],
                    ["nom", "like", "%".$this->search_etudiants."%"],
                ])

                ->orWhere([
                    ["type_user", "=", "Etudiant"],
                    ["prenom", "like", "%".$this->search_etudiants."%"],
                ])

                ->orderBy("prenom", "asc")
                ->paginate(10, array("users.*"))
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
