<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class AbsenceController extends Controller{
        public function ouvrirAbsencesSeance(Request $request){
            return view("Absences.absences_seance");
        }
    }
?>
