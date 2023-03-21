<div>
    <div class = "row">
        @if(Session()->has("erreur"))
            <div class = "alert alert-danger d-flex alert-dismissible fade show mt-1" role = "alert">
                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                    <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <span class = "d-flex justify-content-start">
                    {{session()->get('erreur')}}
                </span>
                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
            </div>
        @elseif(Session()->has("success"))
            <div class = "alert alert-success d-flex alert-dismissible fade show mt-1" role = "alert">
                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                    <path d = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <span class = "d-flex justify-content-start">
                    {{session()->get('success')}}
                </span>
                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
            </div>
        @endif
        <form name = "form-creer-appel" id = "form-creer-appel" method = "post" action = "{{url('/creer-appel')}}">
            {{ csrf_field() }}    
            <div class = "table-responsive">
                <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id = "table">
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
                                        <input type = "checkbox" class = "form-check-input etudiants" name = "select_etudiant[]" value = "{{$this->getInformationsEtudiants($data)->getIdUserAttribute()}}">
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
                @elseif($this->verifierAppelFait($id_seance))
                    <button type = "submit" class = "btn btn-primary mx-2" disabled>
                        <i class = "mdi mdi-plus"></i> 
                        Faire l'appel
                    </button>
                    <p class = "text-danger mt-2 mx-2">L'appel est déjà fait.</p>
                @else
                    <div class = "form-check mb-3">
                        <input type = "checkbox" class = "form-check-input" id = "absence_collectif" name = "absence_collectif" onclick = "UnselectAllCheckBox()">
                        <label class = "form-check-label" for = "select_all">Absence collective</label>
                    </div>
                    <input type = "hidden" name = "id_seance" id = "id_seance" value = "{{$_GET['id_seance']}}" required>
                    <button type = "submit" class = "btn btn-primary mx-2">
                        <i class = "mdi mdi-plus"></i> 
                        Faire l'appel
                    </button>
                @endif
            @endif
        </form>
    </div>
</div>
