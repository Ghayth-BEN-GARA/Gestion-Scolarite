<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class TypePaiement extends Model{
        use HasFactory;
        protected $table = "types_paiements";
        protected $primaryKey = "type";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "type"
        ];

        public function getTypeAttribute(){
            return $this->attributes["type"];
        }

        public function setTypeAttribute($value){
            $this->attributes["type"] = $value;
        }
    }
?>
