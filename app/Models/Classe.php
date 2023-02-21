<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Classe extends Model{
        use HasFactory;
        protected $table = "classes";
        protected $primaryKey = "id_classe";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_classe",
            "designation_classe",
            "date_creation_classe",
            "etudiant_classe",
            "id_annee_universitaire"
        ];

        public function getIdClasseAttribute(){
            return $this->attributes["id_classe"];
        }

        public function getDesignationClasseAttribute(){
            return $this->attributes["designation_classe"];
        }

        public function setDesignationClasseAttribute($value){
            $this->attributes["designation_classe"] = $value;
        }

        public function getDateCreationClasseAttribute(){
            return $this->attributes["date_creation_classe"];
        }

        public function setDateCreationClasseAttribute($value){
            $this->attributes["date_creation_classe"] = $value;
        }

        public function getEtudiantClasseAttribute(){
            return $this->attributes["etudiant_classe"];
        }

        public function setEtudiantClasseAttribute($value){
            $this->attributes["etudiant_classe"] = $value;
        }

        public function getIdAnneeUniversitaireAttribute(){
            return $this->attributes["id_annee_universitaire"];
        }

        public function setIdAnneeUniversitaireAttribute($value){
            $this->attributes["id_annee_universitaire"] = $value;
        }

        public function getFormattedDateCreationClasseAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateCreationClasseAttribute())));
        }
    }
?>
