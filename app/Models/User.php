<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable{
        use HasApiTokens, HasFactory, Notifiable;
        protected $table = "users";
        protected $primaryKey = "id_user";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_user",
            "email",
            "password",
            "nom", 
            "prenom",
            "adresse",
            "date_naissance",
            "genre",
            "mobile",
            "type_user",
            "travail",
            "path_photo_profile",
            "date_creation_user"
        ];

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function getEmailUserAttribute(){
            return $this->attributes["email"];
        }

        public function setEmailUserAttribute($value){
            $this->attributes["email"] = $value;
        }

        public function getPasswordUserAttribute(){
            return $this->attributes["password"];
        }

        public function setPasswordUserAttribute($value){
            $this->attributes["password"] = $value;
        }

        public function getNomUserAttribute(){
            return $this->attributes["nom"];
        }

        public function setNomUserAttribute($value){
            $this->attributes["nom"] = $value;
        }

        public function getPrenomUserAttribute(){
            return $this->attributes["prenom"];
        }

        public function setPrenomUserAttribute($value){
            $this->attributes["prenom"] = $value;
        }

        public function getAdresseUserAttribute(){
            return $this->attributes["adresse"];
        }

        public function setAdresseUserAttribute($value){
            $this->attributes["adresse"] = $value;
        }

        public function getDateNaissanceUserAttribute(){
            return $this->attributes["date_naissance"];
        }

        public function setDateNaissanceUserAttribute($value){
            $this->attributes["date_naissance"] = $value;
        }

        public function getGenreUserAttribute(){
            return $this->attributes["genre"];
        }

        public function setGenreUserAttribute($value){
            $this->attributes["genre"] = $value;
        }

        public function getMobileUserAttribute(){
            return $this->attributes["mobile"];
        }

        public function setMobileUserAttribute($value){
            $this->attributes["mobile"] = $value;
        }

        public function getTypeUserAttribute(){
            return $this->attributes["type_user"];
        }

        public function setTypeUserAttribute($value){
            $this->attributes["type_user"] = $value;
        }

        public function getTravailUserAttribute(){
            return $this->attributes["travail"];
        }

        public function setTravailUserAttribute($value){
            $this->attributes["travail"] = $value;
        }

        public function getPathPhotoProfileUserAttribute(){
            return $this->attributes["path_photo_profile"];
        }

        public function setPathPhotoProfileUserAttribute($value){
            $this->attributes["path_photo_profile"] = $value;
        }

        public function getDateCreationUserAttribute(){
            return $this->attributes["date_creation_user"];
        }

        public function setDateCreationUserAttribute($value){
            $this->attributes["date_creation_user"] = $value;
        }

        public function getFullNameUserAttribute(){
            return $this->getPrenomUserAttribute()." ".$this->getNomUserAttribute();
        }

        public function getFormattedMobileUserAttribute(){
            return '(+216) '.substr($this->getMobileUserAttribute(), 0, 2)." ".substr($this->getMobileUserAttribute(), 2, 3)." ".substr($this->getMobileUserAttribute(), 5, 3);
        }

        public function getFormattedMobile2UserAttribute(){
            return substr($this->getMobileUserAttribute(), 0, 2)." ".substr($this->getMobileUserAttribute(), 2, 3)." ".substr($this->getMobileUserAttribute(), 5, 3);
        }

        public function getFormattedDateNaissanceUserAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateNaissanceUserAttribute())));
        }

        public function getFormattedDateCreationUserAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateCreationUserAttribute())));
        }
    }
?>
