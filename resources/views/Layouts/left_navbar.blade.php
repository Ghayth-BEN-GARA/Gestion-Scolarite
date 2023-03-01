<div class = "leftside-menu">
    @if(Session()->get("acteur") == "Admin")
        <a href = "{{url('/dashboard-admin')}}" class = "logo text-center logo-light">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
        <a href = "{{url('/dashboard-admin')}}" class = "logo text-center logo-dark">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
    @elseif(Session()->get("acteur") == "Comptable")
        <a href = "{{url('/dashboard-comptable')}}" class = "logo text-center logo-light">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
        <a href = "{{url('/dashboard-comptable')}}" class = "logo text-center logo-dark">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
    @elseif(Session()->get("acteur") == "Enseignant")
        <a href = "{{url('/dashboard-enseignant')}}" class = "logo text-center logo-light">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
        <a href = "{{url('/dashboard-enseignant')}}" class = "logo text-center logo-dark">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
    @elseif(Session()->get("acteur") == "Etudiant")
        <a href = "{{url('/dashboard-etudiant')}}" class = "logo text-center logo-light">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
        <a href = "{{url('/dashboard-etudiant')}}" class = "logo text-center logo-dark">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
    @elseif(Session()->get("acteur") == "Parent")
        <a href = "{{url('/dashboard-parent')}}" class = "logo text-center logo-light">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
        <a href = "{{url('/dashboard-parent')}}" class = "logo text-center logo-dark">
            <span class = "logo-lg">
                <img src = "{{asset('/images/favicon.png')}}" alt = "Logo de l'application" height = "120">
            </span>
            <span class = "logo-sm">
                <img src = "{{asset('/images/favicon_sm.png')}}" alt = "Logo de l'application" height = "30">
            </span>
        </a>
    @endif
    <div class = "h-100 mt-4" id = "leftside-menu-container" data-simplebar = "">
        <ul class = "side-nav">
            <li class = "side-nav-title side-nav-item">Navigation</li>
            @if(Session()->get("acteur") == "Admin")
                <li class = "side-nav-item">
                    <a href = "{{url('/dashboard-admin')}}" class = "side-nav-link">
                        <i class = "uil-home-alt"></i>
                        <span> Statistiques </span>
                    </a>
                </li>
            @elseif(Session()->get("acteur") == "Comptable")
                <li class = "side-nav-item">
                    <a href = "{{url('/dashboard-comptable')}}" class = "side-nav-link">
                        <i class = "uil-home-alt"></i>
                        <span> Statistiques </span>
                    </a>
                </li>
            @elseif(Session()->get("acteur") == "Enseignant")
                <li class = "side-nav-item">
                    <a href = "{{url('/dashboard-enseignant')}}" class = "side-nav-link">
                        <i class = "uil-home-alt"></i>
                        <span> Statistiques </span>
                    </a>
                </li>
            @elseif(Session()->get("acteur") == "Etudiant")
                <li class = "side-nav-item">
                    <a href = "{{url('/dashboard-etudiant')}}" class = "side-nav-link">
                        <i class = "uil-home-alt"></i>
                        <span> Statistiques </span>
                    </a>
                </li>
            @endif
            <li class = "side-nav-item">
                <a href = "{{url('/profil')}}" class = "side-nav-link">
                    <i class = "uil-user"></i>
                    <span> Profil </span>
                </a>
            </li>
            @if(Session()->get("acteur") == "Admin")
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#utilisateurs" aria-expanded = "false" aria-controls = "utilisateurs" class = "side-nav-link">
                        <i class = "uil-users-alt"></i>
                        <span> Utilisateurs </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "utilisateurs">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-users')}}">Gérer</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#salles" aria-expanded = "false" aria-controls = "salles" class = "side-nav-link">
                        <i class = "uil-building"></i>
                        <span> Salles </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "salles">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-salles')}}">Gérer</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#modules" aria-expanded = "false" aria-controls = "modules" class = "side-nav-link">
                        <i class = "uil-book-open"></i>
                        <span> Modules </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "modules">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-modules')}}">Gérer</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#specialites" aria-expanded = "false" aria-controls = "specialites" class = "side-nav-link">
                        <i class = "uil-award-alt"></i>
                        <span> Spécialités </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "specialites">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-specialites')}}">Gérer</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#annees_universitaire" aria-expanded = "false" aria-controls = "annees_universitaire" class = "side-nav-link">
                        <i class = "uil-calendar-alt"></i>
                        <span> Années Universitaire </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "annees_universitaire">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-annees-universitaire')}}">Gérer</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#classes" aria-expanded = "false" aria-controls = "classes" class = "side-nav-link">
                        <i class = "uil-meeting-board"></i>
                        <span> Classes </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "classes">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-classes')}}">Gérer</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#emplois" aria-expanded = "false" aria-controls = "emplois" class = "side-nav-link">
                        <i class = " uil-file-redo-alt"></i>
                        <span> Emplois </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "emplois">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-emplois')}}">Gérer</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            @if(Session()->get("acteur") == "Etudiant")
                <li class = "side-nav-item">
                    <a data-bs-toggle = "collapse" href = "#mes_emplois" aria-expanded = "false" aria-controls = "mes_emplois" class = "side-nav-link">
                        <i class = " uil-file-redo-alt"></i>
                        <span> Mes Emplois </span>
                        <span class = "menu-arrow"></span>
                    </a>
                    <div class = "collapse" id = "mes_emplois">
                        <ul class = "side-nav-second-level">
                            <li>
                                <a href = "{{url('/liste-mes-emplois')}}">Consulter</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
    <div class = "clearfix"></div>
</div>