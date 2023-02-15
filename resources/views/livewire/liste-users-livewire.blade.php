<div>
    <div class = "row mb-2">
        <div class = "col-sm-9">
            <div class = "col-sm-4 mb-3">
                <select class = "form-select" id = "role_user" name = "role_user" wire:model = "role_user" required>
                    <option value = "Tout" selected disabled>Sélectionnez le rôle..</option>
                    <option value = "Admin">Admin</option>
                    <option value = "Comptable">Comptable</option>
                    <option value = "Enseignant">Enseignant</option>
                    <option value = "Etudiant">Etudiant</option>
                    <option value = "Parent">Parent</option>
                    </option>
                </select>
            </div>
        </div>
        <div class = "col-sm-3">
            <div class = "mb-3">
                <input type = "search" class = "form-control" id = "users" name = "users" placeholder = "Chercher des utilisateurs.." wire:model = "search_users" required>
            </div>
        </div>
    </div>
    <div class = "table-responsive">
        <table class = "table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
            <thead class = "table-light">
                <tr>
                    <th>Utilisateur</th>
                    <th>Adresse Email</th>
                    <th>Numéro Mobile</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($users) && ($users->count()))
                    @foreach($users as $data)
                        <tr>
                            <td class = "table-user">
                                <img src = "{{URL::asset($data->getPathPhotoProfileUserAttribute())}}" alt = "Photo de profil" class = "me-2 rounded-circle">
                                <a href = "javascript:void(0)" class = "text-body fw-semibold">{{$data->getFullNameUserAttribute()}}</a>
                            </td>
                            <td>{{$data->getEmailUserAttribute()}}</td>
                            <td>{{$data->getFormattedMobileUserAttribute()}}</td>
                            <td>{{$data->getTypeUserAttribute()}}</td>
                            <td>
                                <a href = "{{url('/user?id_user='.$data->getIdUserAttribute())}}" class = "action-icon">
                                    <i class = "mdi mdi-eye"></i>
                                </a>
                                <a href = "javascript:void(0)" class = "action-icon">
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
                        <td colspan = "5" class = "text-center">Aucun utilisateur actuellement trouvé.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class = "mt-3 mb-3">
        {{$users->links("vendor.pagination.pagination_livewire")}}
    </div>
</div>
