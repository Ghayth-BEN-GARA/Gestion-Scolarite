<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\Appel;

    class ListeAbsencesSeanceLivewire extends Component{
        public $id_seance;

        public function render(){
            return view('livewire.liste-absences-seance-livewire');
        }

        public function verifierAppelFait($id_seance){
            return Appel::where("id_seance", "=", $id_seance)->exists();
        }
    }
?>
