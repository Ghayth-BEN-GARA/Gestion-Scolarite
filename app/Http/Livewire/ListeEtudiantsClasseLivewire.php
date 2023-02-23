<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\User;
    use App\Models\Classe;

    class ListeEtudiantsClasseLivewire extends Component{
        public $etudiants;
        public $id_classe;

        public function render(){
            return view('livewire.liste-etudiants-classe-livewire');
        }

        public function getCountEtudiants($etudiants){
            return count(explode(',', $etudiants));
        }

        public function getInformationsEtudiants($id_user){
            return User::where("id_user", "=", $id_user)->first();
        }
    }
?>
