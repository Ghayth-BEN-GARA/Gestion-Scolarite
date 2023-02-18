<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\User;

    class StatistiquesAdminLivewire extends Component{
        public function render(){
            return view('livewire.statistiques-admin-livewire');
        }

        public function getNbrAdmin(){
            return User::where("type_user", "=", "Admin")->count();
        }

        public function getNbrComptable(){
            return User::where("type_user", "=", "Comptable")->count();
        }

        public function getNbrEnseignant(){
            return User::where("type_user", "=", "Enseignant")->count();
        }

        public function getNbrEtudiant(){
            return User::where("type_user", "=", "Etudiant")->count();
        }

        public function getNbrParent(){
            return User::where("type_user", "=", "Parent")->count();
        }
    }
?>
