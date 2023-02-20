<div>
    <div class = "mb-2">
        <div class = "col-sm-12">
            <div class = "mb-3">
                <input type = "search" class = "form-control" id = "specialites" name = "specialites" placeholder = "Chercher des spécialités.." wire:model = "search_specialites" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>#</th>
                    <th>Nom du specialité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($specialites) && ($specialites->count()))
                    <?php $i = 1; ?>
                    @foreach($specialites as $data)
                        <tr>
                            <th scope = "row">{{$i++}}</th>
                            <td>{{$data->getNomSpecialiteAttribute()}}</td>
                            <td>
                                <a href = "{{url('/edit-specialite?id_module='.$data->getIdSpecialiteAttribute())}}" class = "action-icon">
                                        <i class = "mdi mdi-square-edit-outline"></i>
                                </a>
                                <a href = "javascript:void(0)" class = "action-icon" onclick = "questionSupprimerSpecialite({{$data->getIdSpecialiteAttribute()}})">
                                    <i class = "mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "3" class = "text-center">Aucune spécialité actuellement trouvée.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$specialites->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
