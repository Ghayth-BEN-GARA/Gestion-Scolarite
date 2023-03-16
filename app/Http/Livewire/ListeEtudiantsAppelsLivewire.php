<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\User;

    class ListeEtudiantsAppelsLivewire extends Component{
        public $etudiants;
        public $seance;
        
        public function render(){
            return view('livewire.liste-etudiants-appels-livewire');
        }

        public function getInformationsEtudiants($id_user){
            return User::where("id_user", "=", $id_user)->first();
        }
    }
?>
