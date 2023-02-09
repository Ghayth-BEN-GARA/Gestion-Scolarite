<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\ConfigurationCompte;

    class ConfigurationCompteSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $configuration = new ConfigurationCompte();
            $configuration->setIdUserAttribute(1);
            $configuration->save();
        }
    }
?>
