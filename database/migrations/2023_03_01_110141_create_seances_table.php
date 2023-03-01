<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::create('seances', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_seance");
                $table->date("date_seance")->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->time("heure_debut_seance")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->time("heure_fin_seance")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->bigInteger("id_salle")->unsigned()->nullable();
                $table->bigInteger("id_cours")->unsigned()->nullable();
                $table->foreign("id_salle")->references("id_salle")->on("salles")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("id_cours")->references("id_cours")->on("cours")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('seances');
        }
    };
?>
