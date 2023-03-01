<div>
    <div class = "mb-2">
        <div class = "col-sm-12">
            <div class = "mb-3">
                <input type = "search" class = "form-control" id = "search_classes" name = "search_classes" placeholder = "Chercher des classes.." wire:model = "search_classes" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>#</th>
                    <th>classe</th>
                    <th>Spécialité</th>
                    <th>Niveau</th>
                    <th>Année Universitaire</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($classes) && ($classes->count()))
                    <?php $i = 1; ?>
                    @foreach($classes as $data)
                        <tr>
                            <th scope = "row">{{$i++}}</th>
                            <td>{{$data->getDesignationClasseAttribute()}}</td>
                            <td>{{$data->nom_specialite}}</td>
                            <td>{{$data->getNiveauClasseAttribute()}}</td>
                            <td>{{$data->debut_annee_universitaire}} - {{$data->fin_annee_universitaire}}</td>
                            <td>
                                <a href = "{{url('/emploi?id_classe='.$data->getIdClasseAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-eye"></i>
                                </a>
                                <a href = "{{url('/envoie-emploi-classe?id_classe='.$data->getIdClasseAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-square-edit-outline"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "6" class = "text-center">Aucune classe actuellement trouvée.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$classes->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
