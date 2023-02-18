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
            Schema::create('modules', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_module");
                $table->string("nom_module", 800)->default("Aucun");
                $table->string("description_module", 999)->default("Aucun");
                $table->integer("nombre_heure_module")->default(0);
                $table->integer("coefficient_module")->default(0);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('modules');
        }
    };
?>
