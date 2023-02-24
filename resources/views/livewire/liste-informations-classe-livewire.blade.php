<div>
    <div class = "border p-3 mt-4 mt-lg-0 rounded">
        <h4 class = "header-title mb-3">Informations Du Classe</h4>
        <div class = "table-responsive">
            <table class = "table mb-0">
                <tbody>
                    <tr>
                        <td>Identifiant :</td>
                        <td>{{$classe->getIdClasseAttribute()}}</td>
                    </tr>
                    <tr>
                        <td>Désignation :</td>
                        <td>{{$classe->getDesignationClasseAttribute()}}</td>
                    </tr>
                    <tr>
                        <td>Specialité :</td>
                        <td>{{$classe->nom_specialite}}</td>
                    </tr>
                    <tr>
                        <td>Niveau :</td>
                        <td>{{$classe->getNiveauClasseAttribute()}}</td>
                    </tr>
                    <tr>
                        <td>Nombre De <br> Cours :</td>
                        <td class = "pt-3">{{$this->getNbrCoursClasse($classe->getIdClasseAttribute())}}</td>
                    </tr>
                    <tr>
                        <td>Nombre Des <br> Étudiants :</td>
                        <td class = "pt-3">{{$this->getCountEtudiants($classe->getEtudiantClasseAttribute())}}</td>
                    </tr>
                    <tr>
                        <td>Année <br> Universitaire :</td>
                        <td class = "pt-3">{{$classe->debut_annee_universitaire}} - {{$classe->fin_annee_universitaire}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
