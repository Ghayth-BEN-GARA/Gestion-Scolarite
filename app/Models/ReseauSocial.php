<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class ReseauSocial extends Model{
        use HasFactory;
        protected $table = "reseaux_sociaux";
        protected $primaryKey = "id_reseau_social";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_reseau_social",
            "link_facebook",
            "link_instagram",
            "link_github",
            "link_linkedin",
            "id_user"
        ];

        public function getIdReseauSocialAttribute(){
            return $this->attributes["id_reseau_social"];
        }

        public function getLinkFacebookAttribute(){
            return $this->attributes["link_facebook"];
        }

        public function setLinkFacebookAttribute($value){
            $this->attributes["link_facebook"] = $value;
        }

        public function getLinkInstagramAttribute(){
            return $this->attributes["link_instagram"];
        }

        public function setLinkInstagramAttribute($value){
            $this->attributes["link_instagram"] = $value;
        }

        public function getLinkGithubAttribute(){
            return $this->attributes["link_github"];
        }

        public function setLinkGithubAttribute($value){
            $this->attributes["link_github"] = $value;
        }

        public function getLinkLinkedingAttribute(){
            return $this->attributes["link_linkedin"];
        }

        public function setLinkLinkedinAttribute($value){
            $this->attributes["link_linkedin"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }
    }
?>
