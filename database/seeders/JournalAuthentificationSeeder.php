<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\JournalAuthentification;

    class JournalAuthentificationSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $journal = new JournalAuthentification();
            $journal->setTitreJournalAttribute("Inscription");
            $journal->setDescriptionJournalAttribute("S'inscrire dans le système en saisissant les informations requises.");
            $journal->setIdUserAttribute(1);
            $journal->save();
        }
    }
?>
