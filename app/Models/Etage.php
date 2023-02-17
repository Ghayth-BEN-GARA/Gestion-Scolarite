<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Etage extends Model{
        use HasFactory;
        use HasFactory;
        protected $table = "etages";
        protected $primaryKey = "numero_etage";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "numero_etage"
        ];

        public function getNumeroEtageAttribute(){
            return $this->attributes["numero_etage"];
        }

        public function setNumeroEtageAttribute($value){
            $this->attributes["numero_etage"] = $value;
        }
    }
?>
