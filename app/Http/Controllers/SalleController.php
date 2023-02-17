<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Etage;

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
    }
?>
