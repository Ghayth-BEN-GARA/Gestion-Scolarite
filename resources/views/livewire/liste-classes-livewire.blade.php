<div>
    <div class = "row mb-2">
        <div class = "col-sm-9">
            <div class = "col-sm-5 mb-3">
                <select class = "form-select" id = "annee_universitaire" name = "annee_universitaire" wire:model = "annee_universitaire" required>
                    <option value = "Tout" disabled selected>Sélectionnez l'année universitaire..</option>
                    @foreach($this->getListeAnneeUniversitaire() as $data)
                        <option value = "{{$data->getDebutAnneeUniversitaireAttribute()}}">Année universitaire {{$data->getDebutAnneeUniversitaireAttribute()}} - {{$data->getFinAnneeUniversitaireAttribute()}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class = "col-sm-3">
            <div class = "mb-3">
                <input type = "search" class = "form-control" id = "classes" name = "classes" placeholder = "Chercher des classes.." wire:model = "search_classes" required>
            </div>
        </div>
    </div>
    <div class = "row">
        @foreach($classes as $data)
            <div class = "col-lg-6 col-xxl-3">
                <div class = "card d-block">
                    <div class = "card-body">
                        <div class = "dropdown card-widgets">
                            <a href = "javascript:void(0)" class = "dropdown-toggle arrow-none" data-bs-toggle = "dropdown" aria-expanded = "false">
                                <i class = "dripicons-dots-3"></i>
                            </a>
                            <div class = "dropdown-menu dropdown-menu-end">
                                <a href = "javascript:void(0)" class = "dropdown-item">
                                    <i class = "mdi mdi-eye me-1"></i>
                                    Consulter
                                </a>
                                <a href = "javascript:void(0)" class = "dropdown-item">
                                    <i class = "mdi mdi-pencil me-1"></i>
                                    Modifier
                                </a>
                                <a href = "javascript:void(0)" class = "dropdown-item">
                                    <i class = "mdi mdi-delete me-1"></i>
                                    Supprimer
                                </a>
                                <a href = "javascript:void(0)" class = "dropdown-item">
                                    <i class = "mdi mdi-email-outline me-1"></i>
                                    Inviter
                                </a>
                            </div>
                        </div>
                        <h4 class = "mt-0">
                            <a href = "javascrip:void(0)" class = "text-title">{{$data->getDesignationClasseAttribute()}} ({{$data->debut_annee_universitaire}} - {{$data->fin_annee_universitaire}})</a>
                        </h4>
                        @if($data->niveau_classe == "Cycle d'ingénieur")
                            <div class = "badge bg-success p-2 mb-3">{{$data->niveau_classe}}</div>
                        @elseif($data->niveau_classe == "Licence")
                            <div class = "badge bg-secondary p-2 mb-3">{{$data->niveau_classe}}</div>
                        @else
                            <div class = "badge bg-danger p-2 mb-3">{{$data->niveau_classe}}</div>
                        @endif
                        <p class = "text-muted font-13 mb-3">
                            La classe est nommée {{$data->getDesignationClasseAttribute()}} pour l'année universitaire {{$data->debut_annee_universitaire}} - {{$data->fin_annee_universitaire}}  a été créée le <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode($data->getFormattedDateCreationClasseAttribute());?> dont le niveau est {{$data->getNiveauClasseAttribute()}} et la spécialité est {{$data->nom_specialite}}.
                        </p>
                        <p class = "mb-1">
                            <span class = "pe-2 text-nowrap mb-2 d-inline-block">
                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" viewBox = "0 0 24 24" class = "text-muted">
                                    <path fill = "currentColor" d = "M18 10.5V6l-2.11 1.06A3.999 3.999 0 0 1 12 12a3.999 3.999 0 0 1-3.89-4.94L5 5.5L12 2l7 3.5v5h-1M12 9l-2-1c0 1.1.9 2 2 2s2-.9 2-2l-2 1m2.75-3.58L12.16 4.1L9.47 5.47l2.6 1.32l2.68-1.37M12 13c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-3 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"/>
                                </svg>
                                <b>{{$this->getCountEtudiants($data->getEtudiantClasseAttribute())}}</b> Étudiants
                            </span>
                        </p>
                        <div id = "tooltip-container">
                            @if($this->getCountEtudiants($data->getEtudiantClasseAttribute()) > 0)
                                @foreach(array_slice(explode(',', $data->getEtudiantClasseAttribute()), 0, 3) as $ligne) 
                                    <a href = "javascript:void(0)" data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "top" title = "{{$this->getInformationsEtudiants($ligne)->getFullNameUserAttribute()}}" class = "d-inline-block">
                                        <img src = "{{URL::asset($this->getInformationsEtudiants($ligne)->getPathPhotoProfileUserAttribute())}}" class = "rounded-circle avatar-xs" alt = "Photo de profil">
                                    </a>
                                @endforeach
                                @if($this->getCountEtudiants($data->getEtudiantClasseAttribute()) > 3)
                                    <a href = "javascript:void(0)" class = "d-inline-block text-muted fw-bold ms-2">
                                        et {{$this->getCountEtudiants($data->getEtudiantClasseAttribute()) - 3}} de plus
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
