<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class ConfigurationCompte extends Model{
        use HasFactory;
        protected $table = "configurations_comptes";
        protected $primaryKey = "id_configuration_compte";
        public $timestamps = false;
        public $incrementing = false;

         /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_configuration_compte",
            "type_mode",
            "id_user"
        ];

        public function getIdConfigurationCompteAttribute(){
            return $this->attributes["id_configuration_compte"];
        }

        public function getTypeModeConfigurationAttribute(){
            return $this->attributes["type_mode"];
        }

        public function setTypeModeConfigurationAttribute($value){
            $this->attributes["type_mode"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }
    }
?>
