<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Seance extends Model{
        use HasFactory;
        protected $table = "seances";
        protected $primaryKey = "id_seance";
        public $timestamps = false;
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "id_seance",
            "date_seance",
            "heure_debut_seance",
            "heure_fin_seance",
            "id_salle",
            "id_cours"
        ];

        public function getIdSeanceAttribute(){
            return $this->attributes["id_seance"];
        }

        public function getDateSeanceAttribute(){
            return $this->attributes["date_seance"];
        }

        public function setDateSeanceAttribute($value){
            $this->attributes["date_seance"] = $value;
        }

        public function getHeureDebutSeanceAttribute(){
            return $this->attributes["heure_debut_seance"];
        }

        public function setHeureDebutSeanceAttribute($value){
            $this->attributes["heure_debut_seance"] = $value;
        }

        public function getHeureFinSeanceAttribute(){
            return $this->attributes["heure_fin_seance"];
        }

        public function setHeureFinSeanceAttribute($value){
            $this->attributes["heure_fin_seance"] = $value;
        }

        public function getIdSalleAttribute(){
            return $this->attributes["id_salle"];
        }

        public function setIdSalleAttribute($value){
            $this->attributes["id_salle"] = $value;
        }

        public function getIdCoursAttribute(){
            return $this->attributes["id_cours"];
        }

        public function setIdCoursAttribute($value){
            $this->attributes["id_cours"] = $value;
        }

        public function getFormattedDateSeanceAttribute(){
            return strftime("%A %d %B %Y",strtotime(strftime($this->getDateSeanceAttribute())));
        }
    }
?>
