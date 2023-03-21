<div>
    <div class = "row">
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
                                    <a href = "javascript:void(0)" class = "action-icon" onclick = "questionSupprimerAbsences({{$this->getInformationsEtudiants($data)->getIdUserAttribute()}}, {{$id_seance}})">
                                        <i class = "mdi mdi-delete"></i>
                                    </a>
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
