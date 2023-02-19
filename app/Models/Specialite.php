<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Specialite extends Model{
        use HasFactory;
        protected $table = "specialites";
        protected $primaryKey = "id_specialite";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_specialite",
            "nom_specialite"
        ];

        public function getIdSpecialiteAttribute(){
            return $this->attributes["id_specialite"];
        }

        public function getNomSpecialiteAttribute(){
            return $this->attributes["nom_specialite"];
        }

        public function setNomSpecialiteAttribute($value){
            $this->attributes["nom_specialite"] = $value;
        }
    }
?>
