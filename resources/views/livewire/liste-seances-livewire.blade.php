<div>
    <div class = "row mb-2">
        <div class = "col-sm-9">
            <div class = "col-sm-4 mb-3">
                <select class = "form-select" id = "classe" name = "classe" wire:model = "classe" required>
                    <option value = "Tout" selected disabled>Sélectionnez la classe..</option>
                    @if(count($this->getListeClasses()) == 0)
                        <option value = "#" selected disabled>La liste des classes est vide.</option>
                    @else
                        @foreach($this->getListeClasses() as $data)
                            <option value = "{{$data->getIdClasseAttribute()}}">{{$data->getDesignationClasseAttribute()}} ({{$data->debut_annee_universitaire}} - {{$data->fin_annee_universitaire}})</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class = "col-sm-3">
            <div class = "mb-3">
                <input type = "search" class = "form-control" id = "seances" name = "seances" placeholder = "Chercher des séances.." wire:model = "search_seances" required>
            </div>
        </div>
    </div>
    <div class = "row">
        @if(!empty($seances) && ($seances->count()))
            @foreach($seances as $data)
                <div class = "col-xxl-8 col-lg-6">
                    <div class = "card d-block">
                        <div class = "card-body">
                            <div class = "dropdown float-end">
                                <a href = "javascript:void(0)" class = "dropdown-toggle arrow-none card-drop" data-bs-toggle = "dropdown" aria-expanded = "false">
                                    <i class = "dripicons-dots-3"></i>
                                </a>
                                <div class = "dropdown-menu dropdown-menu-end">
                                    <a href = "javascript:void(0)" class = "dropdown-item">
                                        <i class = "mdi mdi-eye me-1"></i>Consulter
                                    </a>
                                    <a href = "javascript:void(0)" class = "dropdown-item">
                                        <i class = "mdi mdi-pencil me-1"></i>Modifier
                                    </a>
                                    <a href = "javascript:void(0)" class = "dropdown-item">
                                        <i class = "mdi mdi-delete me-1"></i>Supprimer
                                    </a>
                                </div>
                            </div>
                            <h3 class = "mt-0">
                                Séance {{$data->nom_module}} ({{$data->designation_classe}})
                            </h3>
                            @if($data->date_seance < date('Y-m-d'))
                                <div class = "badge bg-danger text-light mb-3 p-2">Terminée</div>
                            @elseif($data->date_seance == date('Y-m-d'))
                                <div class = "badge bg-success text-light mb-3 p-2">Aujourd'hui</div>
                            @elseif($data->date_seance > date('Y-m-d'))
                                <div class = "badge bg-secondary text-light mb-3 p-2">À venir</div>
                            @endif
                            <p class = "text-muted mb-4">
                                Une séance du cours de <b>{{$data->nom_module}}</b> enseignée par le professeur <b>{{$data->prenom}} {{$data->nom}}</b> en salle <b>numéro {{$data->id_salle}}</b> construite dans l'étage numéro <b>{{$data->numero_etage}}</b> le <b><?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($data->date_seance)))); ?></b> de <b>{{date('H:i', strtotime($data->heure_debut_seance))}} à {{date('H:i', strtotime($data->heure_fin_seance))}}</b> pour la classe <b>{{$data->designation_classe}}</b> dont l'année universitaire est <b>{{$data->debut_annee_universitaire}} - {{$data->fin_annee_universitaire}}</b>.
                            </p>
                            <div class = "row">
                                <div class = "col-md-4">
                                    <div class = "mb-4">
                                        <h5>Date de la séance</h5>
                                        <small class = "text-capitalize"><?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($data->date_seance)))); ?></small>
                                    </div>
                                </div>
                                <div class = "col-md-4">
                                    <div class = "mb-4">
                                        <h5>Heure du début</h5>
                                        <small>{{date('H:i', strtotime($data->heure_debut_seance))}}</small>
                                    </div>
                                </div>
                                <div class = "col-md-4">
                                    <div class = "mb-4">
                                        <h5>Heure de la fin</h5>
                                        <small>{{date('H:i', strtotime($data->heure_fin_seance))}}</small>
                                    </div>
                                </div>
                            </div>
                            <div id = "tooltip-container">
                                <h5>Liste Des Étudiants:</h5>
                                @if($this->getCountEtudiants($data->etudiant_classe) > 0)
                                    @foreach(array_slice(explode(',', $data->etudiant_classe), 0, 6) as $ligne)
                                        <a href = "javascript:void(0);" data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "top" title = "{{$this->getInformationsEtudiants($ligne)->getFullNameUserAttribute()}}" class = "d-inline-block">
                                            <img src = "{{URL::asset($this->getInformationsEtudiants($ligne)->getPathPhotoProfileUserAttribute())}}" class = "rounded-circle img-thumbnail avatar-sm" alt = "Photo de profil">
                                        </a>
                                    @endforeach
                                    @if($this->getCountEtudiants($data->etudiant_classe) > 6)
                                        &<a href = "javascript:void(0)" class = "d-inline-block text-muted fw-bold ms-2">
                                            et {{$this->getCountEtudiants($data->etudiant_classe) - 3}} de plus
                                        </a>
                                    @endif
                                @else
                                    <p>La liste des étudiants est vide.</p>
                                @endif
                                <h5 class = "mt-2">Enseignant:</h5>
                                <a href = "javascript:void(0);" data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "top" title = "{{$data->prenom}} {{$data->prenom}}" class = "d-inline-block">
                                    <img src = "{{URL::asset($data->path_photo_profile)}}" class = "rounded-circle img-thumbnail avatar-sm" alt = "Photo de profil">
                                </a>
                                <span class = "mx-1">{{$data->prenom}} {{$data->nom}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class = "text-center mx-auto mt-5 py-5">Vous n'avez pas des séances pour cette année universitaire jusqu'à présent.</p>
        @endif
    </div>
    <div class = "mt-3 mb-3">
        {{$seances->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
