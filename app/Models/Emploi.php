<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Emploi extends Model{
        use HasFactory;
        protected $table = "emplois";
        protected $primaryKey = "id_emploi_classe";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_emploi_classe",
            "emploi_classe",
            "semestre",
            "id_classe"
        ];

        public function getIdEmploiClasseAttribute(){
            return $this->attributes["id_emploi_classe"];
        }

        public function getEmploiClasseAttribute(){
            return $this->attributes["emploi_classe"];
        }

        public function setEmploiClasseAttribute($value){
            $this->attributes["emploi_classe"] = $value;
        }

        public function getSemestreAttribute(){
            return $this->attributes["semestre"];
        }

        public function setSemestreAttribute($value){
            $this->attributes["semestre"] = $value;
        }

        public function getIdClasseAttribute(){
            return $this->attributes["id_classe"];
        }

        public function setIdClasseAttribute($value){
            $this->attributes["id_classe"] = $value;
        }
    }
?>
