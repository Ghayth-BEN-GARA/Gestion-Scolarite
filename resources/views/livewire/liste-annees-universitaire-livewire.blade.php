<div>
    <div class = "mb-2">
        <div class = "col-sm-12">
            <div class = "mb-3">
                <input type = "search" class = "form-control" id = "annees_universitaire" name = "annees_universitaire" placeholder = "Chercher des années universitaire.." wire:model = "search_annees_universitaire" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>#</th>
                    <th>Année Universitaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($liste_annees) && ($liste_annees->count()))
                    <?php $i = 1; ?>
                    @foreach($liste_annees as $data)
                        <tr>
                            <th scope = "row">{{$i++}}</th>
                            <td>{{$data->getDebutAnneeUniversitaireAttribute()}} - {{$data->getFinAnneeUniversitaireAttribute()}}</td>
                            <td>
                                <a href = "{{url('/annee-universitaire?id_annee_universitaire='.$data->getIdAnneeUniversitaireAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-eye"></i>
                                </a>
                                <a href = "{{url('/edit-annee-universitaire?id_annee_universitaire='.$data->getIdAnneeUniversitaireAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-square-edit-outline"></i>
                                </a>
                                <a href = "javascript:void(0)" class = "action-icon" onclick = "questionSupprimerAnneeUniversitaire({{$data->getIdAnneeUniversitaireAttribute()}})">
                                    <i class = "mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "3" class = "text-center">Aucune année universitaire actuellement trouvée.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$liste_annees->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
