<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class AnneeUniversitaireActuel extends Model{
        use HasFactory;
        protected $table = "annees_universitaires_actuels";
        protected $primaryKey = "id_annee_universitaire_actuel";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_annee_universitaire_actuel",
            "id_annee_universitaire"
        ];

        public function getIdAnneeUniversitaireActuelAttribute(){
            return $this->attributes["id_annee_universitaire_actuel"];
        }

        public function getIdAnneeUniversitaireAttribute(){
            return $this->attributes["id_annee_universitaire"];
        }

        public function setIdAnneeUniversitaireAttribute($value){
            $this->attributes["id_annee_universitaire"] = $value;
        }
    }
?>
