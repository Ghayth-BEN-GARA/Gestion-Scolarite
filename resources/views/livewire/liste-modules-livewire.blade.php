<div>
    <div class = "mb-2">
        <div class = "col-sm-12">
            <div class = "mb-3">
                <input type = "search" class = "form-control" id = "modules" name = "modules" placeholder = "Chercher des modules.." wire:model = "search_modules" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Nombre d'heure</th>
                    <th>Coefficient</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($modules) && ($modules->count()))
                    <?php $i = 1; ?>
                    @foreach($modules as $data)
                        <tr>
                            <th scope = "row">{{$i++}}</th>
                            <td>{{$data->getNomModuleAttribute()}}</td>
                            <td>{{$data->getNombreHeureModuleAttribute()}}</td>
                            <td>{{$data->getCoefficientModuleAttribute()}}</td>
                            <td>
                                <a href = "{{url('/module?id_module='.$data->getIdModuleAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-eye"></i>
                                </a>
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
                        <td colspan = "5" class = "text-center">Aucun module actuellement trouvé.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$modules->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
