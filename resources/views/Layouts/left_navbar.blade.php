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
            @endif
        </ul>
    </div>
    <div class = "clearfix"></div>
</div>