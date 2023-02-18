<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Module;

    class ModuleController extends Controller{
        public function ouvrirListeModules(){
            return view("Modules.liste_modules");
        }

        public function ouvrirAddModule(){
            return view("Modules.add_module");
        }

        public function gestionCreerModule(Request $request){
            if($this->verifierModuleExist($request->nom_module)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a un autre module déjà créé avec ce nom.");
            }

            else if($this->creerModule($request->nom_module, $request->nbr_heure, $request->coefficient, $request->description)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cet nouvel module a été créé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer cet nouvel module pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierModuleExist($nom_module){
            return Module::where("nom_module", "=", $nom_module)->exists();
        }

        public function creerModule($nom_module, $nbr_heure, $coefficient, $description){
            $module = new Module();
            $module->setNomModuleAttribute($nom_module);
            $module->setNombreHeureModuleAttribute($nbr_heure);
            $module->setCoefficientModuleAttribute($coefficient);
            $module->setDescriptionModuleAttribute($description);

            return $module->save();
        }

        public function ouvrirModule(Request $request){
            $module = $this->getInformationsModule($request->input("id_module"));
            return view("Modules.module", compact("module"));
        }

        public function getInformationsModule($id_module){
            return Module::where("id_module", "=", $id_module)->first();
        }

        public function gestionDeleteModule(Request $request){
            if($this->deleteModule($request->id_module)){
                return back()->with("success", "Nous sommes très heureux de vous informer que ce module a été supprimé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer ce module pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteModule($id_module){
            return Module::where("id_module", "=", $id_module)->delete();
        }
    }
?>
