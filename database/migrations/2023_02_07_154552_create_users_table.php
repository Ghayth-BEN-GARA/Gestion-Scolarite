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
            Schema::create("users", function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_user");
                $table->string("email", 999)->unique()->default("Aucun");
                $table->string("password", 999)->default("Aucun");
                $table->string("nom", 800)->default("Aucun");
                $table->string("prenom", 800)->default("Aucun");
                $table->string("adresse", 700)->default("Aucun");
                $table->date("date_naissance")->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->string("genre", 200)->default("Non spécifié");
                $table->integer("mobile")->default(0);
                $table->string("type_user", 300)->default("Etudiant");
                $table->string("travail", 500)->default("Aucun");
                $table->string("path_photo_profile", 999)->default("images_profiles/user.png");
                $table->datetime("date_creation_user")->default(DB::raw('CURRENT_TIMESTAMP'))->setTimezone('GMT');
                $table->foreign("type_user")->references("type_user")->on("acteurs")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists("users");
        }
    };
?>
