<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\Acteur;

    class ActeurSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $acteur1 = new Acteur();
            $acteur1->setTypeUserAttribute("Admin");
            $acteur1->save();

            $acteur2 = new Acteur();
            $acteur2->setTypeUserAttribute("Comptable");
            $acteur2->save();

            $acteur3 = new Acteur();
            $acteur3->setTypeUserAttribute("Etudiant");
            $acteur3->save();

            $acteur4 = new Acteur();
            $acteur4->setTypeUserAttribute("Enseignants");
            $acteur4->save();

            $acteur5 = new Acteur();
            $acteur5->setTypeUserAttribute("Parents");
            $acteur5->save();
        }
    }
?>
