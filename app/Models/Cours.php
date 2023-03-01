<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Cours extends Model{
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
            "id_module",
            "id_enseignant",
            "id_classe",
            "semestre",
            "date_creation_cours"
        ];

        public function getIdCoursAttribute(){
            return $this->attributes["id_cours"];
        }

        public function getIdModuleAttribute(){
            return $this->attributes["id_module"];
        }

        public function setIdModuleAttribute($value){
            $this->attributes["id_module"] = $value;
        }

        public function getIdEnseignantAttribute(){
            return $this->attributes["id_enseignant"];
        }

        public function setIdEnseignantAttribute($value){
            $this->attributes["id_enseignant"] = $value;
        }

        public function getIdClasseAttribute(){
            return $this->attributes["id_classe"];
        }

        public function setIdClasseAttribute($value){
            $this->attributes["id_classe"] = $value;
        }

        public function getSemestreAttribute(){
            return $this->attributes["semestre"];
        }

        public function setSemestreAttribute($value){
            $this->attributes["semestre"] = $value;
        }

        public function getDateCreationCoursAttribute(){
            return $this->attributes["date_creation_cours"];
        }

        public function setDateCreationCoursAttribute($value){
            $this->attributes["date_creation_cours"] = $value;
        }

        public function getFormattedDateCreationCoursAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateCreationCoursAttribute())));
        }
    }
?>
