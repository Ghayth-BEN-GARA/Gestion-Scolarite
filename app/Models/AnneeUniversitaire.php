<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class AnneeUniversitaire extends Model{
        use HasFactory;
        protected $table = "annees_universitaires";
        protected $primaryKey = "id_annee_universitaire";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_annee_universitaire",
            "debut_annee_universitaire",
            "fin_annee_universitaire",
            "semestre_annee_universitaire"
        ];

        public function getIdAnneeUniversitaireAttribute(){
            return $this->attributes["id_annee_universitaire"];
        }

        public function getDebutAnneeUniversitaireAttribute(){
            return $this->attributes["debut_annee_universitaire"];
        }

        public function setDebutAnneeUniversitaireAttribute($value){
            $this->attributes["debut_annee_universitaire"] = $value;
        }

        public function getFinAnneeUniversitaireAttribute(){
            return $this->attributes["fin_annee_universitaire"];
        }

        public function setFinAnneeUniversitaireAttribute($value){
            $this->attributes["fin_annee_universitaire"] = $value;
        }

        public function getSemestreAnneeUniversitaireAttribute(){
            return $this->attributes["semestre_annee_universitaire"];
        }

        public function setSemestreAnneeUniversitaireAttribute($value){
            $this->attributes["semestre_annee_universitaire"] = $value;
        }
    }
?>
