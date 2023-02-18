<div>
    <div class = "row mb-2">
        <div class = "col-sm-9">
            <div class = "col-sm-4 mb-3">
                <select class = "form-select" id = "etage" name = "etage" wire:model = "etage" required>
                    <option value = "Tout" selected disabled>Sélectionnez l'étage..</option>
                    @foreach($this->getListeEtage() as $data)
                        <option value = "{{$data->getNumeroEtageAttribute()}}">L'étage numéro {{$data->getNumeroEtageAttribute()}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class = "col-sm-3">
            <div class = "mb-3">
                <input type = "search" class = "form-control" id = "salles" name = "salles" placeholder = "Chercher des salles.." wire:model = "search_salles" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>#</th>
                    <th>Salle</th>
                    <th>Étage</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($salles) && ($salles->count()))
                    @foreach($salles as $data)
                        <tr>
                            <th scope = "row">{{$data->getIdSalleAttribute()}}</th>
                            <td>{{$data->getNumeroSalleAttribute()}}</td>
                            <td>Étage numéro {{$data->getEtageSalleAttribute()}}</td>
                            <td>
                                <a href = "#" class = "action-icon">
                                    <i class = "mdi mdi-square-edit-outline"></i>
                                </a>
                                <a href = "javascript:void(0)" class = "action-icon">
                                    <i class = "mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "4" class = "text-center">Aucune salle actuellement trouvée.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
