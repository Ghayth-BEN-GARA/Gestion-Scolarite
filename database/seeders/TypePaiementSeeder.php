<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\TypePaiement;

    class TypePaiementSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $type_paiement1 = new TypePaiement();
            $type_paiement1->setTypeAttribute("Tranche");
            $type_paiement1->save();

            $type_paiement2 = new TypePaiement();
            $type_paiement2->setTypeAttribute("Totale");
            $type_paiement2->save();
        }
    }
?>
