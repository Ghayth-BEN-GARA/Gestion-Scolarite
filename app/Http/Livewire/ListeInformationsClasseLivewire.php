<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\User;
    use App\Models\Classe;
    use App\Models\Cours;

    class ListeInformationsClasseLivewire extends Component{
        public $classe;

        public function render(){
            return view('livewire.liste-informations-classe-livewire');
        }

        public function getNbrCoursClasse($id_classe){
            return Cours::count();
        }

        public function getCountEtudiants($etudiants){
            return count(explode(',', $etudiants));
        }
    }
?>
