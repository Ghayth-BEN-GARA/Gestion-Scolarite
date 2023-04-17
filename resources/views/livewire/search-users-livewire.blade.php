<div>
    <div class = "app-search dropdown d-none d-lg-block">
        <form>
            <div class = "input-group">
                <input type = "text" class = "form-control dropdown-toggle" placeholder = "Chercher des utilisateurs.." id = "top-search" name = "top-search" wire:model = "search_users_navbar">
                <span class = "mdi mdi-magnify search-icon"></span>
                <button class = "input-group-text btn-primary" type = "submit">Chercher</button>
            </div>
        </form>
        @if(strlen($search_users_navbar) > 0)
            <div class = "dropdown-menu dropdown-menu-animated dropdown-lg d-block" id = "search-dropdown">
                <div class = "dropdown-header noti-title">
                    <h5 class = "text-overflow mb-2">
                        <span class = "text-danger">{{count($liste_users)}}</span> 
                        @if(count($liste_users) > 1)
                            utilisateurs trouvés
                        @else
                            utilisateur trouvé
                        @endif
                    </h5> 
                </div>
                @if(Session()->get("acteur") == "Admin")
                    <a href = "{{url('/dashboard-admin')}}" class = "dropdown-item notify-item">
                        <i class = "uil-notes font-16 me-1"></i>
                        <span>Statistiques de l'application</span>
                    </a>
                @elseif(Session()->get("acteur") == "Comptable")
                    <a href = "{{url('/dashboard-comptable')}}" class = "dropdown-item notify-item">
                        <i class = "uil-notes font-16 me-1"></i>
                        <span>Statistiques de l'application</span>
                    </a>
                @elseif(Session()->get("acteur") == "Enseignant")
                    <a href = "{{url('/dashboard-enseignant')}}" class = "dropdown-item notify-item">
                        <i class = "uil-notes font-16 me-1"></i>
                        <span>Statistiques de l'application</span>
                    </a>
                @elseif(Session()->get("acteur") == "Etudiant")
                    <a href = "{{url('/dashboard-etudiant')}}" class = "dropdown-item notify-item">
                        <i class = "uil-notes font-16 me-1"></i>
                        <span>Statistiques de l'application</span>
                    </a>
                @elseif(Session()->get("acteur") == "Parent")
                    <a href = "{{url('/dashboard-parent')}}" class = "dropdown-item notify-item">
                        <i class = "uil-notes font-16 me-1"></i>
                        <span>Statistiques de l'application</span>
                    </a>
                @endif
                <a href = "{{url('aide')}}" class = "dropdown-item notify-item">
                    <i class = "uil-life-ring font-16 me-1"></i>
                    <span>Comment puis-je vous aider ?</span>
                </a>
                <a href = "{{url('/profil')}}" class = "dropdown-item notify-item">
                    <i class = "uil-user font-16 me-1"></i>
                    <span>Mon profil</span>
                </a>
                <div class = "dropdown-header noti-title">
                    <h6 class = "text-overflow mb-2 text-uppercase">Utilisateurs</h6>
                </div>
                <div class = "notification-list">
                    @if(!empty($liste_users) && ($liste_users->count()))
                        @foreach($liste_users as $data)
                            <a href = "{{url('user?id_user='.$data->id_user)}}" class = "dropdown-item notify-item">
                                <div class = "d-flex">
                                    <img class = "d-flex me-2 rounded-circle" src = "{{URL::asset($data->getPathPhotoProfileUserAttribute())}}" alt = "Photo de profil" height = "33" width = "38">
                                    <div class = "w-100">
                                        <h5 class = "m-0 font-14">{{$data->getFullNameUserAttribute()}}</h5>
                                        <span class = "font-12 mb-0">{{$data->getTypeUserAttribute()}}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p class = "text-center mx-auto">Aucun utilisateur actuellement trouvé.</p>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
