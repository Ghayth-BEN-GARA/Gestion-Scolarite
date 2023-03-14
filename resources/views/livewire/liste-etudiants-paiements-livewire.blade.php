<div>
    <div class = "mb-2">
        <div class = "col-sm-12">
            <div class = "mb-3">
                <input type = "search" class = "form-control" id = "search_etudiants" name = "search_etudiants" placeholder = "Chercher des étudiants.." wire:model = "search_etudiants" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>Étudiant</th>
                    <th>Adresse Email</th>
                    <th>Numéro Mobile</th>
                    <th>Date De Naissance</th>
                    <th>Paiement</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($etudiants) && ($etudiants->count()))
                    @foreach($etudiants as $data)
                        <tr>
                            <td class = "table-user">
                                <img src = "{{URL::asset($data->getPathPhotoProfileUserAttribute())}}" alt = "Photo de profil" class = "me-2 rounded-circle">
                                <a href = "javascript:void(0)" class = "text-body fw-semibold">{{$data->getFullNameUserAttribute()}}</a>
                            </td>
                            <td>{{$data->getEmailUserAttribute()}}</td>
                            <td>{{$data->getFormattedMobile2UserAttribute()}}</td>
                            <td>{{$data->getFormattedDateNaissanceUserAttribute()}}</td>
                            <td>
                                <a href = "{{url('/paiement?id_user='.$data->getIdUserAttribute())}}" class = "btn btn-primary">Payer</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan = "5" class = "text-center">Aucune étudiant actuellement trouvée.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$etudiants->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
