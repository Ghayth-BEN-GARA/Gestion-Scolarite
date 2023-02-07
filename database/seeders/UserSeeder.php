<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\User;

    class UserSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $user = new User();
            $user->setEmailUserAttribute("universite.sesame@gmail.com");
            $user->setPasswordUserAttribute(bcrypt("admin"));
            $user->setNomUserAttribute("Sesame");
            $user->setPrenomUserAttribute("Université");
            $user->setAdresseUserAttribute("ZI Chotrana I BP4 Parc Technologique El Ghazela, Ariana");
            $user->setDateNaissanceUserAttribute("2007-09-01");
            $user->setGenreUserAttribute("Non spécifié");
            $user->setMobileUserAttribute("70686486");
            $user->setTypeUserAttribute("Admin");
            $user->setTravailUserAttribute("Aucun");
            $user->setPathPhotoProfileUserAttribute("images_profiles/user.png");
            $user->save();
        }
    }
?>
