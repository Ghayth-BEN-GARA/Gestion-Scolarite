<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\AnneeUniversitaire;
    use App\Models\AnneeUniversitaireActuel;

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

        public function ouvrirAnneeUniversitaire(Request $request){
            $annee_universitaire = $this->getInformationsAnneeUniversitaire($request->input("id_annee_universitaire"));
            return view("Annees_Universitaire.annee_universitaire", compact("annee_universitaire"));
        }

        public function getInformationsAnneeUniversitaire($id_annee_universitaire){
            return AnneeUniversitaire::where("id_annee_universitaire", "=", $id_annee_universitaire)->first();
        }

        public function gestionDeleteAnneeUniversitaire(Request $request){
            if($this->deleteAnneeUniversitaire($request->input("id_annee_universitaire"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette année universitaire a été supprimée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer cette année universitaire pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteAnneeUniversitaire($id_annee_universitaire){
            return AnneeUniversitaire::where("id_annee_universitaire", "=", $id_annee_universitaire)->delete();
        }

        public function ouvrirEditAnneeUniversitaire(Request $request){
            $annee_universitaire = $this->getInformationsAnneeUniversitaire($request->input("id_annee_universitaire"));
            return view("Annees_Universitaire.edit_annee_universitaire", compact("annee_universitaire"));
        }

        public function gestionModifierAnneeUniversitaire(Request $request){
            if($this->verifierAnneeUniversitairePasActuelExiste($request->id_annee_universitaire, $request->date_debut, $request->date_fin)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre année universitaire déjà créé avec les années saisies.");
            }

            else if($this->verifierDateDebutPasActuelExiste($request->id_annee_universitaire, $request->date_debut)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre date universitaire déjà créé avec l'année de début saisie.");
            }

            else if($this->verifierDateFinPasActuelExiste($request->id_annee_universitaire, $request->date_fin)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre date universitaire déjà créé avec l'année de la fin saisie.");
            }

            else if($this->verifierEgaliteDateAnneeUniversitaire($request->date_debut, $request->date_fin) == 0){
                return back()->with("erreur", "Nous sommes désolés de vous dire que l'année universitaire que vous avez saisie n'est pas valide.");
            }

            else if($this->verifierEgaliteDateAnneeUniversitaire($request->date_debut, $request->date_fin) == 1){
                return back()->with("erreur", "Nous sommes désolés de vous dire que l'année universitaire que vous avez saisie n'est pas valide.");
            }

            else if($this->modifierAnneeUniversitaire($request->id_annee_universitaire, $request->date_debut, $request->date_fin)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette année universitaire a été modifiée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier cette année universitaire pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierAnneeUniversitairePasActuelExiste($id_annee_universitaire, $debut, $fin){
            return AnneeUniversitaire::where("debut_annee_universitaire", "=", $debut)
            ->where("fin_annee_universitaire", "=", $fin)
            ->where("id_annee_universitaire", "<>", $id_annee_universitaire)
            ->exists();
        }

        public function verifierDateDebutPasActuelExiste($id_annee_universitaire, $debut){
            return AnneeUniversitaire::where("debut_annee_universitaire", "=", $debut)
            ->where("id_annee_universitaire", "<>", $id_annee_universitaire)
            ->exists();
        }

        public function verifierDateFinPasActuelExiste($id_annee_universitaire, $fin){
            return AnneeUniversitaire::where("fin_annee_universitaire", "=", $fin)
            ->where("id_annee_universitaire", "<>", $id_annee_universitaire)
            ->exists();
        }

        public function modifierAnneeUniversitaire($id_annee_universitaire, $debut, $fin){
            return AnneeUniversitaire::where("id_annee_universitaire", "=", $id_annee_universitaire)->update([
                "debut_annee_universitaire" => $debut,
                "fin_annee_universitaire" => $fin
            ]);
        }

        public function ouvrirEditAnneeUniversitaireActuel(){
            $annee_universitaire = $this->getListeAnneeUniversitaire();
            return view("Annees_Universitaire.edit_annee_universitaire_actuel", compact("annee_universitaire"));
        }

        public function getListeAnneeUniversitaire(){
            return AnneeUniversitaire::get();
        }

        public function gestionModifierAnneeUniversitaireActuel(Request $request){
            if($this->verifierAnneeUniversitaireActuelExiste() == 0){
                if($this->creerAnneeUniversitaireActuel($request->annee_universitaire)){
                    return back()->with("success", "Nous sommes très heureux de vous informer que l'année universitaire actuelle a été modifiée avec succès.");
                }

                else{
                    return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas changer l'année universitaire actuelle pour le moment. Veuillez réessayer plus tard.");
                }
            }

            else if($this->verifierAnneeUniversitaireActuelExiste() == 1){
                if($this->updateAnneeUniversitaireActuel($request->annee_universitaire)){
                    return back()->with("success", "Nous sommes très heureux de vous informer que l'année universitaire actuelle a été modifiée avec succès.");
                }

                else{
                    return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas changer l'année universitaire actuelle pour le moment. Veuillez réessayer plus tard.");
                }
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas changer l'année universitaire actuelle pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierAnneeUniversitaireActuelExiste(){
            return AnneeUniversitaireActuel::count();
        }

        public function creerAnneeUniversitaireActuel($id_annee_universitaire){
            $annee_universitaire = new AnneeUniversitaireActuel();
            $annee_universitaire->setIdAnneeUniversitaireAttribute($id_annee_universitaire);
            return $annee_universitaire->save();
        }

        public function updateAnneeUniversitaireActuel($id_annee_universitaire){
            return AnneUniversitaireActuel::update([
                "id_annee_universitaire" => $id_annee_universitaire
            ]);
        }
    }
?>
