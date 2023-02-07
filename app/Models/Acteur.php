<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Acteur extends Model{
        use HasFactory;
        protected $table = "acteurs";
        protected $primaryKey = "type_user";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "type_user"
        ];

        public function getTypeUserAttribute(){
            return $this->attributes["type_user"];
        }

        public function setTypeUserAttribute($value){
            $this->attributes["type_user"] = $value;
        }
    }
?>