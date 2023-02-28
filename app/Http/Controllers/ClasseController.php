<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\creerMailInviterEtudiantsClasse;
    use App\Mail\creerMailEnvoyerEmploiClasse;
    use App\Models\User;
    use App\Models\AnneeUniversitaire;
    use App\Models\Classe;
    use App\Models\Specialite;
    use App\Models\Emploi;

    class ClasseController extends Controller{
        public function ouvrirListeClasses(){
            return view("Classes.liste_classes");
        }

        public function ouvrirAddClasse(){
            $liste_etudiants = $this->getListeEtudiants();
            $liste_annees_universitaire = $this->getListeAnneeUniversite();
            $liste_specialite = $this->getListeSpecialite();
            return view("Classes.add_classe", compact("liste_etudiants", "liste_annees_universitaire", "liste_specialite"));
        }

        public function getListeEtudiants(){
            return User::where("type_user", "=", "Etudiant")->orderBy("prenom", "asc")->get();
        }

        public function getListeAnneeUniversite(){
            return AnneeUniversitaire::orderBy("debut_annee_universitaire", "asc")->get();
        }

        public function getListeSpecialite(){
            return Specialite::orderBy("nom_specialite", "asc")->get();
        }

        public function gestionCreerClasse(Request $request){
            if($this->verifierClasseAnneeUniversitaireExiste($request->designation, $request->annee_universitaire)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que vous avez déjà inscrit cette classe.");
            }

            else if($this->creerClasse($request->etudiants, $request->designation, $request->annee_universitaire, $request->specialite, $request->niveau)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette classe a été créé avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas créer cette classe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierClasseAnneeUniversitaireExiste($designation, $id_annee_universitaire){
            return Classe::where("designation_classe", "=", $designation)
            ->where("id_annee_universitaire", "=", $id_annee_universitaire)
            ->exists();
        }

        public function creerClasse($etudiants, $designation, $id_annee_universitaire, $specialite, $niveau){
            $classe = new Classe();
            $classe->setDesignationClasseAttribute($designation);
            $classe->setIdAnneeUniversitaireAttribute($id_annee_universitaire);
            $classe->setEtudiantClasseAttribute(implode(',', $etudiants));
            $classe->setIdSpecialiteAttribute($specialite);
            $classe->setNiveauClasseAttribute($niveau);
            return $classe->save();
        }

        public function gestionDeleteClasse(Request $request){
            if($this->deleteclasse($request->input("id_classe"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette classe a été supprimée avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer cette classe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteClasse($id_classe){
            return Classe::where("id_classe", "=", $id_classe)->delete();
        }

        public function ouvrirClasse(Request $request){
            $classe = $this->getInformationsClasse($request->input("id_classe"));
            return view("Classes.classe", compact("classe"));
        }

        public function getInformationsClasse($id_classe){
            return Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")
            ->join("specialites", "specialites.id_specialite", "=", "classes.id_specialite")
            ->where("id_classe", "=", $id_classe)->first();
        }

        public function gestionDeleteEtudiantDeClasse(Request $request){
            if($this->deleteEtudiantDeClasse($request->input("id_user"), $request->input("id_classe"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette étudiant a été retirée de la classe avec succès.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas supprimer cette étudiant pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function deleteEtudiantDeClasse($id_user, $id_classe){
            $classe = Classe::where("id_classe", "=", $id_classe)->first();
            $etudiants = explode(",", $classe->getEtudiantClasseAttribute());
            $final_results = null;

            foreach ($etudiants as $key => $item) {
                if($item == $id_user){
                    unset($etudiants[$key]);
                    $final_results = implode(",", $etudiants);
                }
            }
            
            return $this->updateNewClasse($id_classe, $final_results);
        }

        public function updateNewClasse($id_classe, $new_results){
            return Classe::where("id_classe", "=", $id_classe)->update([
                "etudiant_classe" => $new_results
            ]);
        }

        public function gestionInviterEtudiantDeClasse(Request $request){
            if($this->sendMailInviterEtudiantsAuClasse($request->input("id_classe"))){
                return back()->with("success", "Nous sommes très heureux de vous informer que les e-mails ont bien été envoyés aux étudiants de cette classe.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas inviter ces étudiants pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function sendMailInviterEtudiantsAuClasse($id_classe){
            $classe = Classe::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "classes.id_annee_universitaire")->where("id_classe", "=", $id_classe)->first();
            $etudiants = explode(",", $classe->getEtudiantClasseAttribute());
            $count_mails = 0;

            foreach ($etudiants as $key => $item) {
                $user = User::where("id_user", "=", $etudiants[$key])->get();
                foreach ($user as $data) {
                    $mailData = [
                        'fullname' => $data->getFullNameUserAttribute(),
                        'nom_classe' => $classe->getDesignationClasseAttribute(),
                        'annee_universitaire' => $classe->debut_annee_universitaire." - ".$classe->fin_annee_universitaire
                    ];
    
                    Mail::to($data->getEmailUserAttribute())->send(new creerMailInviterEtudiantsClasse($mailData));
                    $count_mails++;
                }
            }

            if($count_mails == count($etudiants)){
                return true;
            }

            else{
                return false;
            }
        }

        public function ouvrirEditClasse(Request $request){
            $classe = $this->getInformationsClasse($request->input("id_classe"));
            $liste_etudiants = $this->getListeEtudiants();
            $liste_annees_universitaire = $this->getListeAnneeUniversite();
            $liste_specialite = $this->getListeSpecialite();
            return view("Classes.edit_classe", compact("classe", "liste_etudiants", "liste_annees_universitaire", "liste_specialite"));
        }

        public function gestionModifierClasse(Request $request){
            if($this->verifierClasseAnneeUniversitaireNotActuelExiste($request->designation, $request->annee_universitaire, $request->id_classe)){
                return back()->with("erreur", "Nous sommes désolés de vous dire qu'il y a une autre classe déjà inscrit avec cette désignation.");
            }

            else if($this->updateClasse($request->etudiants, $request->designation, $request->annee_universitaire, $request->specialite, $request->niveau, $request->id_classe)){
                return back()->with("success", "Nous sommes très heureux de vous informer que cette classe a été modifiée avec succés.");
            }

            else{
                return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas modifier cette classe pour le moment. Veuillez réessayer plus tard.");
            }
        }

        public function verifierClasseAnneeUniversitaireNotActuelExiste($designation, $id_annee_universitaire, $id_classe){
            return Classe::where("designation_classe", "=", $designation)
            ->where("id_annee_universitaire", "=", $id_annee_universitaire)
            ->where("id_classe", "<>", $id_classe)
            ->exists();
        }

        public function updateClasse($etudiants, $designation, $id_annee_universitaire, $specialite, $niveau, $id_classe){
            return Classe::where("id_classe", "=", $id_classe)->update([
                "etudiant_classe" => implode(",", $etudiants),
                "designation_classe" => $designation,
                "id_annee_universitaire" => $id_annee_universitaire,
                "id_specialite" => $specialite,
                "niveau_classe" => $niveau
            ]);
        }

        public function ouvrirEnvoieEmploiClasse(Request $request){
            $classe = $this->getInformationsClasse($request->input("id_classe"));
            return view("Classes.envoie_emploi_classe", compact("classe"));
        }

        public function gestionEnvoyerEmploi(Request $request){
            $path = $this->creerPathEmploi($request);

            if(!$this->verifierEmploiTempsClasseExiste($request->id_classe, $request->semestre)){
                $this->creerEmploi($request->id_classe, $path, $request->semestre);
                if($this->envoyerEmploi($request->id_classe, $request->objet, $request->message, $path, $request->semestre)){
                    return back()->with("success", "Nous sommes très heureux de vous informer que l'emploi du temps a été envoyé aux étudiants avec succés.");
                }
    
                else{
                    return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas envoyer l'emploi de temps aux étudiants pour le moment. Veuillez réessayer plus tard.");
                }
            }

            else{
                $this->updateEmploi($request->id_classe, $path, $request->semestre);
                if($this->envoyerEmploi($request->id_classe, $request->objet, $request->message, $path, $request->semestre)){
                    return back()->with("success", "Nous sommes très heureux de vous informer que l'emploi du temps a été envoyé aux étudiants avec succés.");
                }
    
                else{
                    return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas envoyer l'emploi de temps aux étudiants pour le moment. Veuillez réessayer plus tard.");
                }
            }
        }

        public function creerEmploi($id_classe, $emploi_classe, $semestre){
            $emploi = new Emploi();
            $emploi->setIdClasseAttribute($id_classe);
            $emploi->setEmploiClasseAttribute($emploi_classe);
            $emploi->setSemestreAttribute($semestre);
            return $emploi->save();
        }

        public function envoyerEmploi($id_classe, $objet, $message, $path, $semestre){
            $classe = $this->getInformationsClasse($id_classe);
            $etudiants = explode(",", $classe->getEtudiantClasseAttribute());
            $count_mails = 0;
            
            $attach = $path;
            foreach ($etudiants as $key => $item) {
                $user = User::where("id_user", "=", $etudiants[$key])->get();
                
                foreach ($user as $data) {
                    $mailData = [
                        'fullname' => $data->getFullNameUserAttribute(),
                        'objet' => $objet,
                        'message' => $message,
                        'semestre' =>$semestre
                    ];
    
                    Mail::to($data->getEmailUserAttribute())
                    ->send(new creerMailEnvoyerEmploiClasse($mailData, $attach));
                    $count_mails++;
                }
            }

            if($count_mails == count($etudiants)){
                return true;
            }

            else{
                return false;
            }
        }

        public function updateEmploi($id_classe, $emploi, $semestre){
            return Emploi::where("id_classe", "=", $id_classe)->update([
                "emploi_classe" => $emploi,
                "semestre" => $semestre
            ]);
        }

        public function verifierEmploiTempsClasseExiste($id_classe, $semestre){
            return Emploi::where("id_classe", "=", $id_classe)
            ->where("semestre", "=", $semestre)
            ->exists();
        }

        public function creerPathEmploi($request){
            $filename = time().$request->file('file')->getClientOriginalName();
            return $request->file->move('emploi_classes/', $filename);
        }
    }
?>
