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
    }
?>