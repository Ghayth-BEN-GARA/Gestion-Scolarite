<div>
    <table class = "table table-bordered table-centered mb-0">
        <thead>
            <tr class = "text-center">
                <th>Identifiant</th>
                <th>Désignation</th>
                <th>Spécialité</th>
                <th>Niveau</th>
                <th>Année <br>Universitaire</th>
                <th>Emplois</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->getListeClasse() as $classe)
                @foreach (explode(',',$classe->getEtudiantClasseAttribute()) as $data)
                    @if($data == auth()->user()->getIdUserAttribute())
                        <tr class = "text-center">    
                            <td>{{$classe->getIdClasseAttribute()}}</td>
                            <td>{{$classe->getDesignationClasseAttribute()}}</td>
                            <td>{{$classe->nom_specialite}}</td>
                            <td>{{$classe->getNiveauClasseAttribute()}}</td>
                            <td>{{$classe->debut_annee_universitaire}} - {{$classe->fin_annee_universitaire}}</td>
                            <td>
                                @if($this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute()) == null && $this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute()) == null)
                                    Pas Disponible
                                @elseif($this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute()) != null && $this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute()) == null)
                                    <a href = "{{$this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute())->getEmploiClasseAttribute()}}" target = "_blank">Semestre 1</a>
                                @elseif($this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute()) == null && $this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute()) != null)
                                    <a href = "{{$this->getEmploisclasseDeuxiemeSemestre($classe->getIdClasseAttribute())->getEmploiClasseAttribute()}}" target = "_blank">Semestre 2</a>
                                @elseif($this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute()) != null && $this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute()) != null)
                                    <a href = "{{$this->getEmploisclassePremiereSemestre($classe->getIdClasseAttribute())->getEmploiClasseAttribute()}}" target = "_blank">Semestre 1</a>
                                    <a href = "{{$this->getEmploisclasseDeuxiemeSemestre($classe->getIdClasseAttribute())->getEmploiClasseAttribute()}}" target = "_blank">Semestre 2</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
