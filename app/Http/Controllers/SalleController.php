<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Etage;
    use App\Models\Salle;

    class SalleController extends Controller{
        public function ouvrirListeSalles(){
            return view("Salles.liste_salles");
        }

        public function ouvrirAddEtage(){
            return view("Salles.add_etage");
        }

        public function gestionCreerEtage(Request $request){
            if($this->verifierEtageExist($request->etage)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a un autre étage déjà créé avec ce numéro.");
            }

            else if($this->creerEtage($request->etage)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cet nouvel étage a été créé avec succès.");
            }

            else{
                return back()->with("error", "Pour des raisons techniques, vous ne pouvez pas créer cet nouvel étage pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierEtageExist($numero_etage){
            return Etage::where("numero_etage", "=", $numero_etage)->exists();
        }

        public function creerEtage($numero_etage){
            $etage = new Etage();
            $etage->setNumeroEtageAttribute($numero_etage);

            return $etage->save();
        }

        public function ouvrirAddSalle(){
            $liste_etages = $this->getListeEtage();
            return view("Salles.add_salle", compact("liste_etages"));
        }

        public function getListeEtage(){
            return Etage::get();
        }

        public function gestionCreerSalle(Request $request){
            if($this->verifierSalleExist($request->salle)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre salle déjà créé avec ce numéro.");
            }

            else if($this->creerSalle($request->salle, $request->etage)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette nouvelle salle a été créé avec succès.");
            }

            else{
                return back()->with("error", "Pour des raisons techniques, vous ne pouvez pas créer cette nouvelle salle pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierSalleExist($numero_salle){
            return Salle::where("numero_salle", "=", $numero_salle)->exists();
        }

        public function creerSalle($numero_salle, $numero_etage){
            $salle = new Salle();
            $salle->setNumeroSalleAttribute($numero_salle);
            $salle->setEtageSalleAttribute($numero_etage);

            return $salle->save();
        }

        public function gestionDeleteSalle(Request $request){
            if($this->deleteSalle($request->id_salle)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette salle a été supprimée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer cette salle pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteSalle($id_salle){
            return Salle::where("id_salle", "=", $id_salle)->delete();
        }

        public function ouvrirEditSalle(Request $request){
            $salle = $this->getInformationsSalle($request->input("id_salle"));
            $liste_etages = $this->getListeEtage();
            return view("Salles.edit_salle", compact("salle", "liste_etages"));
        }

        public function getInformationsSalle($id_salle){
            return Salle::where("id_salle", "=", $id_salle)->first();
        }

        public function gestionModifierSalle(Request $request){
            if($this->verifierSallePasActuelExist($request->id_salle, $request->salle)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre salle déjà créé avec ce numéro.");
            }

            else if($this->modifierSalle($request->id_salle, $request->salle, $request->etage)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette salle a été modifiée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier cette salle pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function modifierSalle($id_salle, $salle, $etage){
            return Salle::where("id_salle", "=", $id_salle)->update([
                "numero_salle" => $salle,
                "numero_etage" => $etage
            ]);
        }

        public function verifierSallePasActuelExist($id_salle, $numero_salle){
            return Salle::where("numero_salle", "=", $numero_salle)->where("id_salle", "<>", $id_salle)->exists();
        }
    }
?>
