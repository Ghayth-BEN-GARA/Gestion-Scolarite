<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class JournalAuthentification extends Model{
        use HasFactory;
        protected $table = "journals_authentification";
        protected $primaryKey = "id_journal";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_journal",
            "titre",
            "description",
            "date_creation_journal",
            "id_user"
        ];
        
        public function getIdJournalAttribute(){
            return $this->attributes["id_journal"];
        }

        public function getTitreJournalAttribute(){
            return $this->attributes["titre"];
        }

        public function setTitreJournalAttribute($value){
            $this->attributes["titre"] = $value;
        }

        public function getDescriptionJournalAttribute(){
            return $this->attributes["description"];
        }

        public function setDescriptionJournalAttribute($value){
            $this->attributes["description"] = $value;
        }

        public function getDateCreationJournalAttribute(){
            return $this->attributes["date_creation_journal"];
        }

        public function setDateCreationJournalAttribute($value){
            $this->attributes["date_creation_journal"] = $value;
        }

        public function getIdUserAttribute(){
            return $this->attributes["id_user"];
        }

        public function setIdUserAttribute($value){
            $this->attributes["id_user"] = $value;
        }

        public function getFormattedDateCreationJournalAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateCreationJournalAttribute())));
        }
    }
?>
