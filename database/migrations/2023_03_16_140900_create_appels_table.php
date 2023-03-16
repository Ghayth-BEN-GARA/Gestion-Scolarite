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
            Schema::create('appels', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_appel");
                $table->bigInteger("id_seance")->unsigned()->nullable();
                $table->string("liste_presences", 999)->default("Aucun");
                $table->string("liste_absences", 999)->default("Aucun");
                $table->datetime("date_time_appel")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->foreign("id_seance")->references("id_seance")->on("seances")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('appels');
        }
    };
?>
