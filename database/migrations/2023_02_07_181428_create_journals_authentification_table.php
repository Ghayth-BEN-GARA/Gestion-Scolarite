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
            Schema::create("journals_authentification", function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_journal");
                $table->string("titre", 600)->default("Aucun");
                $table->string("description", 999)->default("Aucun");
                $table->datetime("date_creation_journal")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->bigInteger("id_user")->unsigned()->nullable();
                $table->foreign("id_user")->references("id_user")->on("users")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists("journals_authentification");
        }
    };
?>
