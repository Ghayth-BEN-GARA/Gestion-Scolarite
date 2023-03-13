<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\MethodePaiement;

    class MethodePaiementSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $methode_paiement1 = new MethodePaiement();
            $methode_paiement1->setMethodeAttribute("Chèque");
            $methode_paiement1->save();

            $methode_paiement2 = new MethodePaiement();
            $methode_paiement2->setMethodeAttribute("Espèces");
            $methode_paiement2->save();

            $methode_paiement3 = new MethodePaiement();
            $methode_paiement3->setMethodeAttribute("Virement bancaire");
            $methode_paiement3->save();
        }
    }
?>
