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
            Schema::create('annees_universitaires_actuels', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_annee_universitaire_actuel");
                $table->bigInteger("id_annee_universitaire")->unsigned()->nullable();
                $table->foreign("id_annee_universitaire")->references("id_annee_universitaire")->on("annees_universitaires")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('annees_universitaires_actuels');
        }
    };
?>
