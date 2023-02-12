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
            Schema::create('reseaux_sociaux', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_reseau_social");
                $table->string("link_facebook", 700)->default("#");
                $table->string("link_instagram", 700)->default("#");
                $table->string("link_github", 700)->default("#");
                $table->string("link_linkedin", 700)->default("#");
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
            Schema::dropIfExists('reseaux_sociaux');
        }
    };
?>
