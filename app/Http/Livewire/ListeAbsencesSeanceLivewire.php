<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\Appel;
    use App\Models\User;

    class ListeAbsencesSeanceLivewire extends Component{
        public $id_seance;
        public $etudiants;

        public function render(){
            return view('livewire.liste-absences-seance-livewire');
        }

        public function verifierAppelFait($id_seance){
            return Appel::where("id_seance", "=", $id_seance)->exists();
        }

        public function getInformationsAppel($id_seance){
            return Appel::where("id_seance", "=", $id_seance)->first();
        }

        public function getInformationsEtudiants($id_user){
            return User::where("id_user", "=", $id_user)->first();
        }
    }
?>
