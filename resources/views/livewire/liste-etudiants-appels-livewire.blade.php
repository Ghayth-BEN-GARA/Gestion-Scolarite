<div>
    <div class = "row">
        <form name = "form-creer-appel" id = "form-creer-appel" method = "post" action = "#">
            <div class = "table-responsive">
                <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
                    <thead class = "table-light">
                        <tr>
                            <th style = "width: 20px;">
                                <div class = "form-check">
                                    <input type = "checkbox" class = "form-check-input" id = "select_all" onclick = "selectAllCheckBox()">
                                    <label class = "form-check-label" for = "select_all">&nbsp;</label>
                                </div>
                            </th>
                            <th>Nom et prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(explode(',', $etudiants) as $data) 
                            {{ csrf_field() }}
                            <tr>
                                <td>
                                    <div class = "form-check">
                                        <input type = "checkbox" class = "form-check-input" name = "select_etudiant" id = "{{$this->getInformationsEtudiants($data)->getIdUserAttribute()}}">
                                        <label class = "form-check-label" for = "{{$this->getInformationsEtudiants($data)->getIdUserAttribute()}}">&nbsp;</label>
                                    </div>
                                </td>
                                <td class = "table-user">
                                    <img src = "{{URL::asset($this->getInformationsEtudiants($data)->getPathPhotoProfileUserAttribute())}}" alt = "{{$this->getInformationsEtudiants($data)->getFullNameUserAttribute()}}" class = "me-2 rounded-circle">
                                    <a href = "javascript:void(0)" class = "text-body fw-semibold">{{$this->getInformationsEtudiants($data)->getFullNameUserAttribute()}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($seance->date_seance < date("Y-m-d"))
                <button type = "submit" class = "btn btn-primary mx-2" disabled>
                    <i class = "mdi mdi-plus"></i> 
                    Faire l'appel
                </button>
                <p class = "text-danger mt-2 mx-2">La date de la séance est déjà dépassée.</p>
            @elseif($seance->date_seance > date("Y-m-d"))
                <button type = "submit" class = "btn btn-primary mx-2" disabled>
                    <i class = "mdi mdi-plus"></i> 
                    Faire l'appel
                </button>
                <p class = "text-danger mt-2 mx-2">La date de la séance n'est pas encore venue.</p>
            @elseif($seance->date_seance == date("Y-m-d")) 
                @if(now('+01:00')->format('H:i:s') < $seance->heure_debut_seance)
                    <button type = "submit" class = "btn btn-primary mx-2" disabled>
                        <i class = "mdi mdi-plus"></i> 
                        Faire l'appel
                    </button>
                    <p class = "text-danger mt-2 mx-2">La séance n'est pas encore commencée.</p>
                @elseif(now('+01:00')->format('H:i:s') > date("H:i:s", strtotime($seance->heure_debut_seance)+(60*31)))
                    <button type = "submit" class = "btn btn-primary mx-2" disabled>
                        <i class = "mdi mdi-plus"></i> 
                        Faire l'appel
                    </button>
                    <p class = "text-danger mt-2 mx-2">L'heure de début est déjà dépassée plus que 30 minutes de retard.</p>
                @else
                    <button type = "submit" class = "btn btn-primary mx-2">
                        <i class = "mdi mdi-plus"></i> 
                        Faire l'appel
                    </button>
                @endif
            @endif
        </form>
    </div>
</div>
