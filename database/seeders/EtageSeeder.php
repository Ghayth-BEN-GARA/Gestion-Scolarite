<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\Etage;

    class EtageSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $etage1 = new Etage();
            $etage1->setNumeroEtageAttribute(1);
            $etage1->save();

            $etage2 = new Etage();
            $etage2->setNumeroEtageAttribute(2);
            $etage2->save();

            $etage3 = new Etage();
            $etage3->setNumeroEtageAttribute(3);
            $etage3->save();

            $etage4 = new Etage();
            $etage4->setNumeroEtageAttribute(4);
            $etage4->save();
        }
    }
?>
