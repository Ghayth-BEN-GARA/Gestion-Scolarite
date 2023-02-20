<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\User;
    use App\Models\Etage;
    use App\Models\Salle;
    use App\Models\Module;
    use App\Models\Specialite;

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

        public function getNbrUser(){
            return User::get()->count();
        }

        public function getNbrEtage(){
            return Etage::get()->count();
        }

        public function getNbrSalle(){
            return Salle::get()->count();
        }

        public function getNbrModule(){
            return Module::get()->count();
        }

        public function getNbrSpecialite(){
            return Specialite::get()->count();
        }
    }
?>
