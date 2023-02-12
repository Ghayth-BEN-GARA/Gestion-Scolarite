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
        </ul>
    </div>
    <div class = "clearfix"></div>
</div>