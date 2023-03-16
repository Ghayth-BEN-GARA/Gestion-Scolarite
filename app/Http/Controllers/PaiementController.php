<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\TypePaiement;
    use App\Models\User;
    use App\Models\AnneeUniversitaire;
    use App\Models\MethodePaiement;
    use App\Models\PaiementEtudiant;

    class PaiementController extends Controller{
        public function ouvrirListeEtudiants(){
            return view("Paiements.liste_etudiants");
        }

        public function ouvrirPaiement(Request $request){
            $liste_types_paiements = $this->getListeTypesPaiements();
            $etudiant = $this->getInformationsEtudiants($request->input("id_user"));
            $liste_annees_universitaires = $this->getListeAnneesUniversitaires();
            $liste_methodes_paiement = $this->getListeMethodesPaiements();
            $liste_paiements = $this->getInformationsPaiementsEtudiants($request->input("id_user"));
            return view("Paiements.paiement", compact("liste_types_paiements", "etudiant", "liste_annees_universitaires", "liste_methodes_paiement", "liste_paiements"));
        }

        public function getListeTypesPaiements(){
            return TypePaiement::orderBy("type", "asc")->get();
        }

        public function getInformationsEtudiants($id_user){
            return User::where("id_user", "=", $id_user)->where("type_user", "=", "Etudiant")->first();
        }

        public function getListeAnneesUniversitaires(){
            return AnneeUniversitaire::orderBy("debut_annee_universitaire", "asc")->get();
        }

        public function getListeMethodesPaiements(){
            return MethodePaiement::orderBy("methode", "asc")->get();
        }

        public function gestionCreerPaiement(Request $request){
            if($this->verifierMontantTranchesPayer($request->id_user, $request->annee_universitaire)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que l'étudiant choisi a payé ses frais de scolarité.");
            }

            else if($this->verifierMontantTotalePayer($request->id_user, $request->annee_universitaire)){
                return back()->with("erreur", "Nous sommes désolés de vous dire que l'étudiant choisi a payé ses frais de scolarité.");
            }

            else if(!$this->verifierEtudiantPayerOuNon($request->id_user, $request->annee_universitaire)){
                if($this->creerPaiementEtudiant($request->id_user, $request->type, $request->annee_universitaire, $request->methode, $request->montant)){
                    return back()->with("success", "Nous sommes très heureux de vous informer que vous avez payé les frais de scolarité avec succès.");
                }

                else{
                    return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas payer les frais de scolarité pour le moment. Veuillez réessayer plus tard.");
                }
            }

            else if($this->verifierEtudiantPayerOuNon($request->id_user, $request->annee_universitaire)){
                if($this->modifierPaiement($request->id_user, $request->annee_universitaire, $request->montant, $request->methode) && $request->type == "Tranche"){
                    return back()->with("success", "Nous sommes très heureux de vous informer que vous avez payé les frais de scolarité avec succès.");
                }

                else{
                    return back()->with("erreur", "Pour des raisons techniques, vous ne pouvez pas payer les frais de scolarité pour le moment. Veuillez réessayer plus tard.");
                }
            }
        }

        public function verifierMontantTranchesPayer($id_user, $annee_universitaire){
            return PaiementEtudiant::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "paiements_etudiants.id_annee_universitaire")
            ->where("montant_tranche1", "<>", 0.000)
            ->where("montant_tranche2", "<>", 0.000)
            ->where("montant_tranche3", "<>", 0.000)
            ->where("paiements_etudiants.id_annee_universitaire", "=", $annee_universitaire)
            ->where("id_etudiant", "=", $id_user)
            ->exists();
        }

        public function verifierMontantTotalePayer($id_user, $annee_universitaire){
            return PaiementEtudiant::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "paiements_etudiants.id_annee_universitaire")
            ->where("montant_totale", "<>", 0.000)
            ->where("paiements_etudiants.id_annee_universitaire", "=", $annee_universitaire)
            ->where("id_etudiant", "=", $id_user)
            ->exists();
        }

        public function verifierEtudiantPayerOuNon($id_user, $annee_universitaire){
            return PaiementEtudiant::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "paiements_etudiants.id_annee_universitaire")
            ->where("paiements_etudiants.id_annee_universitaire", "=", $annee_universitaire)
            ->where("id_etudiant", "=", $id_user)
            ->exists();
        }

        public function getInformationsPaiementsEtudiantsAnneeUniversitaire($id_user, $annee_universitaire){
            return PaiementEtudiant::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "paiements_etudiants.id_annee_universitaire")
            ->where("paiements_etudiants.id_annee_universitaire", "=", $annee_universitaire)
            ->where("id_etudiant", "=", $id_user)
            ->first();
        }

        public function creerPaiementEtudiant($id_user, $type, $annee_universitaire, $methode, $montant){
            $paiement_etudiant = new PaiementEtudiant();
            $paiement_etudiant->setIdEtudiantAttribute($id_user);
            $paiement_etudiant->setTypePaiementAttribute($type);
            $paiement_etudiant->setIdAnneeUniversitaireAttribute($annee_universitaire);

            if($type == "Totale"){
                $paiement_etudiant->setMontantTotaleAttribute($montant);
                $paiement_etudiant->setDatePaiementTotaleAttribute(date('Y-m-d'));
                $paiement_etudiant->setMethodePaiementTotaleAttribute($methode);
            }

            else if(!$this->verifierEtudiantPayerOuNon($id_user, $annee_universitaire)){
                $paiement_etudiant->setMontantTranche1Attribute($montant);
                $paiement_etudiant->setDatePaiementTranche1Attribute(date('Y-m-d'));
                $paiement_etudiant->setMethodePaiement1Attribute($methode);
            }

            return $paiement_etudiant->save();
        }

        public function modifierPaiement($id_user, $annee_universitaire, $montant, $methode){
            if($this->verifierEtudiantPayerOuNon($id_user, $annee_universitaire) && $this->getInformationsPaiementsEtudiantsAnneeUniversitaire($id_user, $annee_universitaire)->getMontantTranche2Attribute() == 0.000){
                return PaiementEtudiant::where("id_etudiant", "=", $id_user)->where("id_annee_universitaire", "=", $annee_universitaire)->update([
                    "date_paiement_tranche2" => date('Y-m-d'),
                    "montant_tranche2" => $montant,
                    "methode_paiement2" => $methode
                ]);
            }

            else if($this->verifierEtudiantPayerOuNon($id_user, $annee_universitaire) && $this->getInformationsPaiementsEtudiantsAnneeUniversitaire($id_user, $annee_universitaire)->getMontantTranche3Attribute() == 0.000){
                return PaiementEtudiant::where("id_etudiant", "=", $id_user)->where("id_annee_universitaire", "=", $annee_universitaire)->update([
                    "date_paiement_tranche3" => date('Y-m-d'),
                    "montant_tranche3" => $montant,
                    "methode_paiement3" => $methode
                ]);
            }
        }

        public function getInformationsPaiementsEtudiants($id_user){
            return PaiementEtudiant::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "paiements_etudiants.id_annee_universitaire")
            ->join("users", "users.id_user", "=", "paiements_etudiants.id_etudiant")
            ->where("id_etudiant", "=", $id_user)
            ->get();
        }

        public function ouvrirInformationsPaiementEtudiant(Request $request){
            $informations_paiements = $this->getInformationsPaiements($request->input("id_paiement"));
            return view("Paiements.informations_paiement_etudiant", compact("informations_paiements"));
        }

        public function getInformationsPaiements($id_paiement){
            return PaiementEtudiant::join("annees_universitaires", "annees_universitaires.id_annee_universitaire", "=", "paiements_etudiants.id_annee_universitaire")
            ->where("id_paiement_etudiant", "=", $id_paiement)
            ->first();
        }
    }
?>
