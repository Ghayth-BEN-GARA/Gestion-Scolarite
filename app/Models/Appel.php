<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Appel extends Model{
        use HasFactory;
        protected $table = "appels";
        protected $primaryKey = "id_appel";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_appel",
            "id_seance",
            "absence_collectif",
            "liste_absences",
            "date_time_appel"
        ];

        public function getIdAppelAttribute(){
            return $this->attributes["id_appel"];
        }

        public function getIdSeanceAttribute(){
            return $this->attributes["id_seance"];
        }

        public function setSeanceAttribute($value){
            $this->attributes["id_seance"] = $value;
        }

        public function getAbsenceCollectifAttribute(){
            return $this->attributes["absence_collectif"];
        }

        public function setAbsenceCollectifAttribute($value){
            $this->attributes["absence_collectif"] = $value;
        }

        public function getListeAbsencesAttribute(){
            return $this->attributes["liste_absences"];
        }

        public function setListeAbsencesAttribute($value){
            $this->attributes["liste_absences"] = $value;
        }

        public function getDateTimeAppelAttribute(){
            return $this->attributes["date_time_appel"];
        }

        public function setDateTimeAppelAttribute($value){
            $this->attributes["date_time_appel"] = $value;
        }

        public function getFormattedDateTimeAppelAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateTimeAppelAttribute())));
        }
    }
?>
