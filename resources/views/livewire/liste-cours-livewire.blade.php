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
                <input type = "search" class = "form-control" id = "cours" name = "cours" placeholder = "Chercher des cours.." wire:model = "search_cours" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>#</th>
                    <th>Enseignant</th>
                    <th>Module</th>
                    <th>Classe</th>
                    <th>Année Universitaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($cours) && ($cours->count()))
                    <?php $i = 1; ?>
                    @foreach($cours as $data)
                        <tr>
                            <th scope = "row">{{$i++}}</th>
                            <td class = "table-user">
                                <img src = "{{URL::asset($data->path_photo_profile)}}" alt = "Photo de profil" class = "me-2 rounded-circle">
                                <a href = "javascript:void(0)" class = "text-body fw-semibold">{{$data->prenom}} {{$data->nom}}</a>
                            </td>
                            <td>{{$data->nom_module}}</td>
                            <td>{{$data->designation_classe}}</td>
                            <td>{{$data->debut_annee_universitaire}} - {{$data->fin_annee_universitaire}}</td>
                            <td>
                                <a href = "{{url('/cours?id_cours='.$data->getIdCoursAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-eye"></i>
                                </a>
                                <a href = "{{url('/edit-cours?id_cours='.$data->getIdCoursAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-square-edit-outline"></i>
                                </a>
                                <a href = "javascript:void(0)" class = "action-icon" onclick = "questionSupprimerCours({{$data->getIdCoursAttribute()}})">
                                    <i class = "mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "6" class = "text-center">Aucun cours actuellement trouvé.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$cours->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
