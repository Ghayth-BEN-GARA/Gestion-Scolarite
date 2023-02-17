<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Salle extends Model{
        use HasFactory;
        protected $table = "salles";
        protected $primaryKey = "id_salle";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_salle",
            "numero_salle",
            "etage"
        ];

        public function getIdSalleAttribute(){
            return $this->attributes["id_salle"];
        }

        public function getNumeroSalleAttribute(){
            return $this->attributes["numero_salle"];
        }

        public function setNumeroSalleAttribute($value){
            $this->attributes["numero_salle"] = $value;
        }

        public function getEtageSalleAttribute(){
            return $this->attributes["etage"];
        }

        public function setEtageSalleAttribute($value){
            $this->attributes["etage"] = $value;
        }
    }
?>
