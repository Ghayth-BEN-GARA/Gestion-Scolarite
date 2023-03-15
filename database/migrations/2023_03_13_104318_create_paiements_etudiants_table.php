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
            Schema::create('paiements_etudiants', function (Blueprint $table) {
                $table->collation = "utf8_general_ci";
                $table->charset = "utf8";
                $table->id("id_paiement_etudiant");
                $table->bigInteger("id_etudiant")->unsigned()->nullable();
                $table->string("methode_paiement1", 30)->nullable();
                $table->string("methode_paiement2", 30)->nullable();
                $table->string("methode_paiement3", 30)->nullable();
                $table->string("methode_paiement_totale", 30)->nullable();
                $table->string("type_paiement", 30)->default("Tranche");
                $table->decimal("montant_tranche1", 10, 3)->default(0.000);
                $table->decimal("montant_tranche2", 10, 3)->default(0.000);
                $table->decimal("montant_tranche3", 10, 3)->default(0.000);
                $table->decimal("montant_totale", 10, 3)->default(0.000);
                $table->date("date_paiement_tranche1")->nullable();
                $table->date("date_paiement_tranche2")->nullable();
                $table->date("date_paiement_tranche3")->nullable();
                $table->date("date_paiement_totale")->nullable();
                $table->bigInteger("id_annee_universitaire")->unsigned()->nullable();
                $table->foreign("id_etudiant")->references("id_user")->on("users")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("methode_paiement1")->references("methode")->on("methodes_paiements")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("methode_paiement2")->references("methode")->on("methodes_paiements")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("methode_paiement3")->references("methode")->on("methodes_paiements")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("methode_paiement_totale")->references("methode")->on("methodes_paiements")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("type_paiement")->references("type")->on("types_paiements")->onDelete("cascade")->onUpdate("cascade");
                $table->foreign("id_annee_universitaire")->references("id_annee_universitaire")->on("annees_universitaires")->onDelete("cascade")->onUpdate("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('paiements_etudiants');
        }
    };
?>