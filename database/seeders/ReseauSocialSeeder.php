<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\ReseauSocial;

    class ReseauSocialSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $reseau_social = new ReseauSocial();
            $reseau_social->setLinkFacebookAttribute("#");
            $reseau_social->setLinkInstagramAttribute("#");
            $reseau_social->setLinkGithubAttribute("#");
            $reseau_social->setLinkLinkedinAttribute("#");
            $reseau_social->setIdUserAttribute(1);
            
            $reseau_social->save();
        }
    }
?>
