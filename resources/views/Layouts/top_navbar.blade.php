<div class = "navbar-custom">
    <ul class = "list-unstyled topbar-menu float-end mb-0">
        <li class = "dropdown notification-list d-lg-none">
            <a class = "nav-link dropdown-toggle arrow-none" data-bs-toggle = "dropdown" href = "javascript:void(0)" role = "button" aria-haspopup = "false" aria-expanded = "false">
                <i class = "dripicons-search noti-icon"></i>
            </a>
            <div class = "dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class = "p-3">
                    <input type = "text" class = "form-control" placeholder = "Chercher des utilisateurs.." aria-label = "Recipient's username">
                </form>
            </div>
        </li>
        <li class = "dropdown notification-list">
            <a class = "nav-link dropdown-toggle arrow-none" data-bs-toggle = "dropdown" href = "javascript:void(0)" role = "button" aria-haspopup = "false" aria-expanded = "false">
                <i class = "dripicons-bell noti-icon"></i>
                <span class = "noti-icon-badge"></span>
            </a>
            <div class = "dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                <div class = "dropdown-item noti-title">
                    <h5 class = "m-0">
                        <span class = "float-end">
                            <a href = "javascript: void(0);" class = "text-dark">
                                <small>Tout Effacer</small>
                            </a>
                        </span>
                        Notifications
                    </h5>
                </div>
                <a href = "javascript:void(0)" class = "dropdown-item text-center text-primary notify-item notify-all">
                    Voir Tout
                </a>
            </div>
        </li>
        <li class = "dropdown notification-list d-none d-sm-inline-block">
            <a class = "nav-link dropdown-toggle arrow-none" data-bs-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "false" aria-expanded = "false">
                <i class = "dripicons-view-apps noti-icon"></i>
            </a>
            <div class = "dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">
                <div class = "p-2">
                    <div class = "row g-0">
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://universitesesame.com/">
                                <img src = "{{asset('/images/website.png')}}" alt = "Photo de Site Web">
                                <span>Site Web</span>
                            </a>
                        </div>
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://www.facebook.com/sesametunisie/">
                                <img src = "{{asset('/images/facebook.png')}}" alt = "Photo de Facebook">
                                <span>Facebook</span>
                            </a>
                        </div>
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://www.instagram.com/universitesesame/">
                                <img src = "{{url('/images/instagram.png')}}" alt = "Photo de Instagram">
                                <span>Instagram</span>
                            </a>
                        </div>
                    </div>
                    <div class = "row g-0">
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://www.youtube.com/channel/UCOdU44MSqNqa-jCSM6n3aIA">
                                <img src = "{{asset('/images/youtube.png')}}" alt = "Photo de Youtube">
                                <span>Youtube</span>
                            </a>
                        </div>
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "https://tn.linkedin.com/company/sesame-executive">
                                <img src = "{{url('/images/linkedin.png')}}" alt = "Photo de Linkedin">
                                <span>Linkedin</span>
                            </a>
                        </div>
                        <div class = "col">
                            <a class = "dropdown-icon-item" href = "mailto:sesame@sesame.com.tn">
                                <img src = "{{url('/images/google.png')}}" alt = "Photo de Google">
                                <span>Google</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class = "notification-list">
            <a class = "nav-link end-bar-toggle" href = "javascript: void(0)">
                <i class = "dripicons-gear noti-icon"></i>
            </a>
        </li>
        <li class = "dropdown notification-list">
            <a class = "nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle = "dropdown" href = "javascript:void(0)" role = "button" aria-haspopup = "false" aria-expanded = "false">
                <span class = "account-user-avatar"> 
                    <img src = "{{URL::asset(auth()->user()->getPathPhotoProfileUserAttribute())}}" alt = "Photo de profil" class = "rounded-circle">
                </span>
                <span>
                    <span class = "account-user-name text-capitalize">{{auth()->user()->getFullNameUserAttribute()}}</span>
                    <span class = "account-position text-capitalize">{{auth()->user()->getTypeUserAttribute()}}</span>
                </span>
            </a>
            <div class = "dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <div class = "dropdown-header noti-title">
                    <h6 class = "text-overflow m-0">Bienvenu !</h6>
                </div>
                <a href = "javascript:void(0)" class = "dropdown-item notify-item">
                    <i class = "mdi mdi-account-circle me-1"></i>
                    <span>Profil</span>
                </a>
                <a href = "{{url('/journal-authentification')}}" class = "dropdown-item notify-item">
                    <i class = "mdi mdi-format-list-bulleted me-1"></i>
                    <span>Journal d'authentification</span>
                </a>
                <a href = "javascript:void(0)" class = "dropdown-item notify-item end-bar-toggle">
                    <i class = "mdi mdi-cog me-1"></i>
                    <span>Paramètres</span>
                </a>
                <a href = "{{url('/aide')}}" class = "dropdown-item notify-item">
                    <i class = "mdi mdi-help me-1"></i>
                    <span>Aide</span>
                </a>
                <a href = "javascript:void(0)" class = "dropdown-item notify-item" onclick = "questionDeconnexion()">
                    <i class = "mdi mdi-logout me-1"></i>
                    <span>Déconnexion</span>
                </a>
            </div>
        </li>
    </ul>
    <button class = "button-menu-mobile open-left">
        <i class = "mdi mdi-menu"></i>
    </button>
    <div class = "app-search dropdown d-none d-lg-block">
        <form>
            <div class = "input-group">
                <input type = "text" class = "form-control dropdown-toggle" placeholder = "Chercher des utilisateurs.." id = "top-search">
                <span class = "mdi mdi-magnify search-icon"></span>
                <button class = "input-group-text btn-primary" type = "submit">Chercher</button>
            </div>
        </form>
    </div>
</div>