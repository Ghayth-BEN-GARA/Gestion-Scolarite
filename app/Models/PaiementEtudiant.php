<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PaiementEtudiant extends Model{
        use HasFactory;
        protected $table = "paiements_etudiants";
        protected $primaryKey = "id_paiement_etudiant";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_paiement_etudiant",
            "id_etudiant",
            "methode_paiement1",
            "methode_paiement2",
            "methode_paiement3",
            "methode_paiement_totale",
            "type_paiement",
            "montant_tranche1",
            "montant_tranche2",
            "montant_tranche3",
            "montant_totale",
            "date_paiement_tranche1",
            "date_paiement_tranche2",
            "date_paiement_tranche3",
            "date_paiement_totale",
            "id_annee_universitaire"
        ];

        public function getIdPaiementEtudiantAttribute(){
            return $this->attributes["id_paiement_etudiant"];
        }

        public function getIdEtudiantAttribute(){
            return $this->attributes["id_etudiant"];
        }

        public function setIdEtudiantAttribute($value){
            $this->attributes["id_etudiant"] = $value;
        }

        public function getMethodePaiement1Attribute(){
            return $this->attributes["methode_paiement1"];
        }

        public function setMethodePaiement1Attribute($value){
            $this->attributes["methode_paiement1"] = $value;
        }

        public function getMethodePaiement2Attribute(){
            return $this->attributes["methode_paiement2"];
        }

        public function setMethodePaiement2Attribute($value){
            $this->attributes["methode_paiement2"] = $value;
        }

        public function getMethodePaiement3Attribute(){
            return $this->attributes["methode_paiement3"];
        }

        public function setMethodePaiement3Attribute($value){
            $this->attributes["methode_paiement3"] = $value;
        }

        public function getMethodePaiementTotaleAttribute(){
            return $this->attributes["methode_paiement_totale"];
        }

        public function setMethodePaiementTotaleAttribute($value){
            $this->attributes["methode_paiement_totale"] = $value;
        }

        public function getTypePaiementAttribute(){
            return $this->attributes["type_paiement"];
        }

        public function setTypePaiementAttribute($value){
            $this->attributes["type_paiement"] = $value;
        }

        public function getMontantTranche1Attribute(){
            return $this->attributes["montant_tranche1"];
        }

        public function setMontantTranche1Attribute($value){
            $this->attributes["montant_tranche1"] = $value;
        }

        public function getMontantTranche2Attribute(){
            return $this->attributes["montant_tranche2"];
        }

        public function setMontantTranche2Attribute($value){
            $this->attributes["montant_tranche2"] = $value;
        }

        public function getMontantTranche3Attribute(){
            return $this->attributes["montant_tranche3"];
        }

        public function setMontantTranche3Attribute($value){
            $this->attributes["montant_tranche3"] = $value;
        }

        public function getMontantTotaleAttribute(){
            return $this->attributes["montant_totale"];
        }

        public function setMontantTotaleAttribute($value){
            $this->attributes["montant_totale"] = $value;
        }

        public function getDatePaiementTranche1Attribute(){
            return $this->attributes["date_paiement_tranche1"];
        }

        public function setDatePaiementTranche1Attribute($value){
            $this->attributes["date_paiement_tranche1"] = $value;
        }

        public function getDatePaiementTranche2Attribute(){
            return $this->attributes["date_paiement_tranche2"];
        }

        public function setDatePaiementTranche2Attribute($value){
            $this->attributes["date_paiement_tranche2"] = $value;
        }

        public function getDatePaiementTranche3Attribute(){
            return $this->attributes["date_paiement_tranche3"];
        }

        public function setDatePaiementTranche3Attribute($value){
            $this->attributes["date_paiement_tranche3"] = $value;
        }

        public function getDatePaiementTotaleAttribute(){
            return $this->attributes["date_paiement_totale"];
        }

        public function setDatePaiementTotaleAttribute($value){
            $this->attributes["date_paiement_totale"] = $value;
        }

        public function getIdAnneeUniversitaireAttribute(){
            return $this->attributes["id_annee_universitaire"];
        }

        public function setIdAnneeUniversitaireAttribute($value){
            $this->attributes["id_annee_universitaire"] = $value;
        }

        public function getFormattedDatePaiementTranche1Attribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDatePaiementTranche1Attribute())));
        }

        public function getFormattedDatePaiementTranche2Attribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDatePaiementTranche2Attribute())));
        }

        public function getFormattedDatePaiementTranche3Attribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDatePaiementTranche3Attribute())));
        }

        public function getFormattedDatePaiementTotaleAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDatePaiementTotaleAttribute())));
        }
    }
?>
