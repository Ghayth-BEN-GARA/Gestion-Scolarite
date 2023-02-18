<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Module extends Model{
        use HasFactory;
        protected $table = "modules";
        protected $primaryKey = "id_module";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_module",
            "nom_module",
            "description_module",
            "nombre_heure_module",
            "coefficient_module"
        ];

        public function getIdModuleAttribute(){
            return $this->attributes["id_module"];
        }

        public function getNomModuleAttribute(){
            return $this->attributes["nom_module"];
        }

        public function setNomModuleAttribute($value){
            $this->attributes["nom_module"] = $value;
        }

        public function getDescriptionModuleAttribute(){
            return $this->attributes["description_module"];
        }

        public function setDescriptionModuleAttribute($value){
            $this->attributes["description_module"] = $value;
        }

        public function getNombreHeureModuleAttribute(){
            return $this->attributes["nombre_heure_module"];
        }

        public function setNombreHeureModuleAttribute($value){
            $this->attributes["nombre_heure_module"] = $value;
        }

        public function getCoefficientModuleAttribute(){
            return $this->attributes["coefficient_module"];
        }

        public function setCoefficientModuleAttribute($value){
            $this->attributes["coefficient_module"] = $value;
        }
    }
?>
