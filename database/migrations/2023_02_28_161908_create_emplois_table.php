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
            Schema::create('emplois', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_emploi_classe");
                $table->string("emploi_classe", 999)->default("Aucun");
                $table->string("semestre", 300)->default("Aucun");
                $table->bigInteger("id_classe")->unsigned()->nullable();
                $table->foreign("id_classe")->references("id_classe")->on("classes")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('emplois');
        }
    };
?>
