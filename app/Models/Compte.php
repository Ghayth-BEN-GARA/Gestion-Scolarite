<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Compte extends Model{
        use HasFactory;
        protected $table = "comptes";
        protected $primaryKey = "id_compte";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_compte",
            "status_compte",
            "id_user"
        ];

        public function getIdCompteAttribute(){
            return $this->attributes["id_compte"];
        }

        public function getStatusCompteAttribute(){
            return $this->attributes["status_compte"];
        }

        public function setStatusCompteAttribute($value){
            $this->attributes["status_compte"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }
    }
?>
