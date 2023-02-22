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
            Schema::create('classes', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_classe");
                $table->string("designation_classe", 300)->default("Aucun");
                $table->datetime("date_creation_classe")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->string("etudiant_classe", 400)->default("Aucun");
                $table->bigInteger("id_specialite")->unsigned()->nullable();
                $table->string("niveau_classe", 700)->default("Licence");
                $table->bigInteger("id_annee_universitaire")->unsigned()->nullable();
                $table->foreign("id_annee_universitaire")->references("id_annee_universitaire")->on("annees_universitaires")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("id_specialite")->references("id_specialite")->on("specialites")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('classes');
        }
    };
?>
