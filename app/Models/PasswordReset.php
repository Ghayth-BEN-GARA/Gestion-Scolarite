<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PasswordReset extends Model{
        use HasFactory;
        protected $table = "passwords_resets";
        protected $primaryKey = "id_reset_password";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_reset_password",
            "token",
            "id_user"
        ];

        public function getIdResetPasswordAttribute(){
            return $this->attributes["id_reset_password"];
        }

        public function getTokenAttribute(){
            return $this->attributes["token"];
        }

        public function setTokenAttribute($value){
            $this->attributes["token"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }
    }
?>
