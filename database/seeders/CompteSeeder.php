<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\Compte;

    class CompteSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $compte = new Compte();
            $compte->setStatusCompteAttribute("Activé");
            $compte->setIdUserAttribute(1);
            $compte->save();
        }
    }
?>
