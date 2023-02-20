<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Specialite;

    class SpecialiteController extends Controller{
        public function ouvrirListeSpecialites(){
            return view("Specialites.liste_specialites");
        }

        public function ouvrirAddSpecialite(){
            return view("Specialites.add_specialite");
        }

        public function gestionCreerSpecialite(Request $request){
            if($this->verifierSpecialiteExist($request->specialite)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre spécialité déjà créé avec ce nom.");
            }

            else if($this->creerSpecialite($request->specialite)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette nouvelle spécialité a été créé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer cette nouvelle spécialité pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierSpecialiteExist($specialite){
            return Specialite::where("nom_specialite", "=", $specialite)->exists();
        }

        public function creerSpecialite($nom){
            $specialite_branche = new Specialite();
            $specialite_branche->setNomSpecialiteAttribute($nom);

            return $specialite_branche->save();
        }

        public function gestionDeleteSpecialite(Request $request){
            if($this->deleteSpecialite($request->input("id_specialite"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette spécialité a été supprimée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer cette spécialité pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteSpecialite($id_specialite){
            return Specialite::where("id_specialite", "=", $id_specialite)->delete();
        }

        public function ouvrirEditSpecialite(Request $request){
            $specialite = $this->getInformationsSpecialite($request->input("id_specialite"));
            return view("Specialites.edit_specialite", compact("specialite"));
        }

        public function getInformationsSpecialite($id_specialite){
            return Specialite::where("id_specialite", "=", $id_specialite)->first();
        }

        public function gestionModifierSpecialite(Request $request){
            if($this->modifierSpecialite($request->id_specialite, $request->nom_specialite)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette spécialité a été modifiée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier cette spécialité pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function modifierSpecialite($id_specialite, $nom_specialite){
            return Specialite::where("id_specialite", "=", $id_specialite)->update([
                "nom_specialite" => $nom_specialite
            ]);
        }
    }
?>
