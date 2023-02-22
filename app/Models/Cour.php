<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Cour extends Model{
        use HasFactory;
        protected $table = "cours";
        protected $primaryKey = "id_cours";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_cours",
            "id_enseignant",
            "id_module",
            "id_classe",
            "heure_debut",
            "heure_fin"
        ];

        public function getIdCoursAttribute(){
            return $this->attributes["id_cours"];
        }

        public function getIdEnseignantAttribute(){
            return $this->attributes["id_enseignant"];
        }

        public function setIdEnseignantAttribute($value){
            $this->attributes["date_creid_enseignantation_classe"] = $value;
        }

        public function getIdModuleAttribute(){
            return $this->attributes["id_module"];
        }

        public function setIdModuleAttribute($value){
            $this->attributes["id_module"] = $value;
        }

        public function getIdClasseAttribute(){
            return $this->attributes["id_classe"];
        }

        public function setIdClasseAttribute($value){
            $this->attributes["id_classe"] = $value;
        }

        public function getHeureDebutAttribute(){
            return $this->attributes["heure_debut"];
        }

        public function setHeureDebutAttribute($value){
            $this->attributes["heure_debut"] = $value;
        }

        public function getHeureFinAttribute(){
            return $this->attributes["heure_fin"];
        }

        public function setHeureFinAttribute($value){
            $this->attributes["heure_fin"] = $value;
        }
    }
?>
