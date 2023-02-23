<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\User;
    use App\Models\Classe;

    class ListeEtudiantsClasseLivewire extends Component{
        public $etudiants;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-etudiants-classe-livewire');
        }

        public function getCountEtudiants($etudiants){
            return count(explode(',', $etudiants));
        }

        public function getInformationsEtudiants($id_user){
            return User::where("id_user", "=", $id_user)->first();
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }
    }
?>
