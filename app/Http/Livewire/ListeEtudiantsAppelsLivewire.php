<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\User;
    use App\Models\Appel;

    class ListeEtudiantsAppelsLivewire extends Component{
        public $etudiants;
        public $seance;
        public $id_seance;
        
        public function render(){
            return view('livewire.liste-etudiants-appels-livewire');
        }

        public function getInformationsEtudiants($id_user){
            return User::where("id_user", "=", $id_user)->first();
        }

        public function verifierAppelFait($id_seance){
            return Appel::where("id_seance", "=", $id_seance)->exists();
        }
    }
?>
