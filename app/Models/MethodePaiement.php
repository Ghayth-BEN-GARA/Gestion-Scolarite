<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class MethodePaiement extends Model{
        use HasFactory;
        protected $table = "methodes_paiements";
        protected $primaryKey = "methode";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "methode"
        ];

        public function getMethodeAttribute(){
            return $this->attributes["methode"];
        }

        public function setMethodeAttribute($value){
            $this->attributes["methode"] = $value;
        }
    }
?>
