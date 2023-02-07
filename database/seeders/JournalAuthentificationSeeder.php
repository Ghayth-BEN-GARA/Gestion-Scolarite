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
            $journal->setTitreJournalAttribute("Connexion");
            $journal->setDescriptionJournalAttribute("Se connecter au système en entrant l'adresse e-mail et le mot de passe de l'utilisateur");
            $journal->setIdUserAttribute(1);
            $journal->save();
        }
    }
?>
