<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use Livewire\WithPagination;
    use Illuminate\Pagination\Paginator;
    use App\Models\Seance;
    use App\Models\Classe;
    use App\Models\User;
    use App\Models\AnneeUniversitaire;
    use App\Models\AnneeUniversitaireActuel;
    use App\Models\Cours;
    use App\Models\Salle;

    class ListeSeancesLivewire extends Component{
        public $classe = "Tout";
        public $search_seances;
        public $currentPage = 1;
        use WithPagination;

        public function render(){
            if($this->classe == "Tout"){
                return view('livewire.liste-seances-livewire', [
                    "seances" => Cours::where([
                        ["designation_classe", "like", "%".$this->search_seances."%"],
                    ])

                    ->orWhere([
                        ["nom_module", "like", "%".$this->search_seances."%"],
                    ])

                    ->orWhere([
                        ["prenom", "like", "%".$this->search_seances."%"],
                    ])

                    ->orWhere([
                        ["nom", "like", "%".$this->search_seances."%"],
                    ])

                    ->join("classes", "classes.id_classe", "=", "cours.id_classe")
                    ->join("modules", "modules.id_module", "=", "cours.id_module")
                    ->join("users", "users.id_user", "=", "cours.id_enseignant")
                    ->join("seances", "seances.id_cours", "cours.id_cours")
                    ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
                    ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "annees_universitaires.id_annee_universitaire")
                    ->join("salles", "salles.id_salle", "=", "seances.id_salle")
                    ->orderBy("prenom", "asc")
                    ->paginate(10, array("classes.*", "modules.*", "users.*", "cours.*", "annees_universitaires.*", "seances.*", "annees_universitaires_actuels.*", "salles.*"))
                ]);
            }

            else{
                return view('livewire.liste-seances-livewire', [
                    "seances" => Cours::where([
                        ["designation_classe", "like", "%".$this->search_seances."%"],
                        ["classes.id_classe", "like", "%".$this->classe."%"],
                    ])

                    ->orWhere([
                        ["nom_module", "like", "%".$this->search_seances."%"],
                        ["classes.id_classe", "like", "%".$this->classe."%"],
                    ])

                    ->orWhere([
                        ["prenom", "like", "%".$this->search_seances."%"],
                        ["classes.id_classe", "like", "%".$this->classe."%"],
                    ])

                    ->orWhere([
                        ["nom", "like", "%".$this->search_seances."%"],
                        ["classes.id_classe", "like", "%".$this->classe."%"],
                    ])

                    ->join("classes", "classes.id_classe", "=", "cours.id_classe")
                    ->join("modules", "modules.id_module", "=", "cours.id_module")
                    ->join("users", "users.id_user", "=", "cours.id_enseignant")
                    ->join("seances", "seances.id_cours", "cours.id_cours")
                    ->join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
                    ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "annees_universitaires.id_annee_universitaire")
                    ->join("salles", "salles.id_salle", "=", "seances.id_salle")
                    ->orderBy("date_seance", "desc")
                    ->paginate(10, array("classes.*", "modules.*", "users.*", "cours.*", "annees_universitaires.*", "seances.*", "annees_universitaires_actuels.*", "salles.*"))
                ]);
            }
        }

        public function setPage($url){
            $this->currentPage = explode("page=", $url)[1];

            Paginator::currentPageResolver(function(){
                return $this->currentPage;
            });
        }

        public function getListeClasses(){
            return Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("annees_universitaires_actuels", "annees_universitaires_actuels.id_annee_universitaire", "=", "annees_universitaires.id_annee_universitaire")
            ->get();
        }

        public function getCountEtudiants($liste_etudiants){
            return count(explode(',', $liste_etudiants));
        }

        public function getInformationsEtudiants($id_user){
            return User::where("id_user", "=", $id_user)->first();
        }
    }
?>
