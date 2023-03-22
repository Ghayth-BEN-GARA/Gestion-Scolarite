<div>
    <div class = "row">
        @if(Session()->has("erreur_absences"))
            <div class = "alert alert-danger d-flex alert-dismissible fade show mt-1" role = "alert">
                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                    <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <span class = "d-flex justify-content-start">
                    {{session()->get('erreur_absences')}}
                </span>
                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
            </div>
        @elseif(Session()->has("success_absences"))
            <div class = "alert alert-success d-flex alert-dismissible fade show mt-1" role = "alert">
                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                    <path d = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <span class = "d-flex justify-content-start">
                    {{session()->get('success_absences')}}
                </span>
                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
            </div>
        @endif
        @if(!$this->verifierAppelFait($id_seance))
            <p class = "text-muted text-black text-center">L'appel n'est pas encore fait.</p>
        @elseif($this->getInformationsAppel($id_seance)->getAbsenceCollectifAttribute() == true)
            <div class = "table-responsive">
                <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
                    <thead class = "table-light">
                        <tr>
                            <th>Nom et prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(explode(',', $etudiants) as $data)
                            <tr>
                                <td class = "table-user">
                                    <img src = "{{URL::asset($this->getInformationsEtudiants($data)->getPathPhotoProfileUserAttribute())}}" alt = "{{$this->getInformationsEtudiants($data)->getFullNameUserAttribute()}}" class = "me-2 rounded-circle">
                                    <a href = "javascript:void(0)" class = "text-body fw-semibold">{{$this->getInformationsEtudiants($data)->getFullNameUserAttribute()}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class = "text-muted text-center text-uppercase"><b>Absence Collective</b></p>
            </div>
        @elseif($this->getInformationsAppel($id_seance)->getAbsenceCollectifAttribute() == false)
            <div class = "table-responsive">
                <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
                    <thead class = "table-light">
                        <tr>
                            <th>Nom et prénom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(explode(',', $this->getInformationsAppel($id_seance)->getListeAbsencesAttribute()) as $data)
                            <tr>
                                <td class = "table-user">
                                    <img src = "{{URL::asset($this->getInformationsEtudiants($data)->getPathPhotoProfileUserAttribute())}}" alt = "{{$this->getInformationsEtudiants($data)->getFullNameUserAttribute()}}" class = "me-2 rounded-circle">
                                    <a href = "javascript:void(0)" class = "text-body fw-semibold" style = "font-size:12px">{{$this->getInformationsEtudiants($data)->getFullNameUserAttribute()}}</a>
                                </td>
                                <td>
                                    @if($seance->date_seance == date("Y-m-d") && now('+01:00')->format('H:i:s') < date("H:i:s", strtotime($seance->heure_debut_seance)+(60*31)))
                                        <a href = "javascript:void(0)" class = "action-icon" onclick = "questionSupprimerAbsences({{$this->getInformationsEtudiants($data)->getIdUserAttribute()}}, {{$id_seance}})">
                                            <i class = "mdi mdi-delete"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class = "text-muted text-center text-uppercase"><b>Appel Fait</b></p>
            </div>
        @endif
    </div>
</div>
