<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\Module;

    class ListeModulesLivewire extends Component{
        public $search_modules;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            return view('livewire.liste-modules-livewire', [
                'modules' => Module::where([
                    ["nom_module", "like", "%".$this->search_modules."%"],
                ])

                ->orderBy("nom_module", "asc")
                ->paginate(10, array("modules.*"))
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
