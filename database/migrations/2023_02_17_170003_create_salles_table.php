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
            Schema::create('salles', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_salle");
                $table->integer("numero_salle")->default(0);
                $table->bigInteger("numero_etage")->unsigned()->nullable();
                $table->foreign("numero_etage")->references("numero_etage")->on("etages")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('salles');
        }
    };
?>
