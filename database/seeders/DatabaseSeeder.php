<?php
    namespace Database\Seeders;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder{
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run(){
            $this->call([
                ActeurSeeder::class,
                UserSeeder::class,
                CompteSeeder::class,
                JournalAuthentificationSeeder::class,
                ConfigurationCompteSeeder::class,
                ReseauSocialSeeder::class,
                EtageSeeder::class,
                SpecialiteSeeder::class,
                MethodePaiementSeeder::class,
                TypePaiementSeeder::class
            ]);
        }
    }
?>
