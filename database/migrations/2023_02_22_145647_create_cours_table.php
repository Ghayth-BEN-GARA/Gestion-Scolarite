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
            Schema::create('cours', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_cours");
                $table->bigInteger("id_enseignant")->unsigned()->nullable();
                $table->bigInteger("id_module")->unsigned()->nullable();
                $table->bigInteger("id_classe")->unsigned()->nullable();
                $table->time("heure_debut")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->time("heure_fin")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->foreign("id_enseignant")->references("id_user")->on("users")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("id_module")->references("id_module")->on("modules")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("id_classe")->references("id_classe")->on("classes")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('cours');
        }
    };
?>
