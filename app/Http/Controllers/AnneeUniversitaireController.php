<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\AnneeUniversitaire;

    class AnneeUniversitaireController extends Controller{
        public function ouvrirListeAnneesUniversitaire(){
            return view("Annees_Universitaire.liste_annees_universitaire");
        }

        public function ouvrirAddAnneeUniversitaire(){
            return view("Annees_Universitaire.add_annee_universitaire");
        }

        public function gestionCreerAnneeUniversitaire(Request $request){
            if($this->verifierAnneeUniversitaireExiste($request->date_debut, $request->date_fin)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre année universitaire déjà créé avec les années saisies.");
            }

            else if($this->verifierDateDebutExiste($request->date_debut)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre date universitaire déjà créé avec l'année de début saisie.");
            }

            else if($this->verifierDateFinExiste($request->date_fin)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre date universitaire déjà créé avec l'année de la fin saisie.");
            }

            else if($this->verifierEgaliteDateAnneeUniversitaire($request->date_debut, $request->date_fin) == 0){
                return back()->with("erreur", "Nous sommes désolés de vous dire que l'année universitaire que vous avez saisie n'est pas valide.");
            }

            else if($this->verifierEgaliteDateAnneeUniversitaire($request->date_debut, $request->date_fin) == 1){
                return back()->with("erreur", "Nous sommes désolés de vous dire que l'année universitaire que vous avez saisie n'est pas valide.");
            }

            else if($this->creerAnneeUniversitaire($request->date_debut, $request->date_fin)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette année universitaire a été créé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer cette année universitaire pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierAnneeUniversitaireExiste($debut, $fin){
            return AnneeUniversitaire::where("debut_annee_universitaire", "=", $debut)
            ->where("fin_annee_universitaire", "=", $fin)
            ->exists();
        }

        public function verifierDateDebutExiste($debut){
            return AnneeUniversitaire::where("debut_annee_universitaire", "=", $debut)->exists();
        }

        public function verifierDateFinExiste($fin){
            return AnneeUniversitaire::where("fin_annee_universitaire", "=", $fin)->exists();
        }

        public function verifierEgaliteDateAnneeUniversitaire($debut, $fin){
            return strcmp($debut, $fin);
        }

        public function creerAnneeUniversitaire($debut, $fin){
            $annee = new AnneeUniversitaire();
            $annee->setDebutAnneeUniversitaireAttribute($debut);
            $annee->setFinAnneeUniversitaireAttribute($fin);

            return $annee->save();
        }
    }
?>
