<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\Specialite;

    class SpecialiteSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $specialite1 = new Specialite();
            $specialite1->setNomSpecialiteAttribute("Technology");
            $specialite1->save();

            $specialite2 = new Specialite();
            $specialite2->setNomSpecialiteAttribute("Business");
            $specialite2->save();
        }
    }
?>
