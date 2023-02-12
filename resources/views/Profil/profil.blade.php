<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Mon Profil | Université Sesame</title>
    </head>
    @include("Layouts.body_configuration")
        <div id = "preloader">
            <div id = "status">
                <div class = "bouncing-loader">
                    <div></div><div></div><div></div>
                </div>
            </div>
        </div>
        <div class = "wrapper">
            @include("Layouts.left_navbar")
            <div class = "content-page">
                <div class = "content">
                    @include("Layouts.top_navbar")
                    <div class = "container-fluid">
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "page-title-box">
                                    <div class = "page-title-right">
                                        <ol class = "breadcrumb m-0">
                                            @include("Layouts.page_title_site")
                                            <li class = "breadcrumb-item active">Mon Profil</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Profil</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-xl-4 col-lg-5">
                                <div class = "card text-center">
                                    <div class = "card-body">
                                        <img src = "{{URL::asset(auth()->user()->getPathPhotoProfileUserAttribute())}}" class = "rounded-circle avatar-lg img-thumbnail" alt = "Photo de profil">
                                        <h4 class = "mb-0 mt-2">{{auth()->user()->getFullNameUserAttribute()}}</h4>
                                        <p class = "text-muted font-14">{{auth()->user()->getTypeUserAttribute()}}</p>
                                        <a href = "#" class = "btn btn-success btn-sm mb-2">Modifier</a>
                                        <div class = "text-start mt-3">
                                            <h4 class = "font-13 text-uppercase">À propos de moi :</h4>
                                            <p class = "text-muted font-13 mb-3">
                                                Bonjour, je m'appelle {{auth()->user()->getFullNameUserAttribute()}}, je suis un {{auth()->user()->getTypeUserAttribute()}} à l'université Sesame. Je suis de {{auth()->user()->getAdresseUserAttribute()}}.
                                            </p>
                                            <p class = "text-muted mb-2 font-13">
                                                <strong>Nom Complet :</strong>
                                                <span class = "ms-2">{{auth()->user()->getFullNameUserAttribute()}}</span>
                                            </p>
                                            <p class = "text-muted mb-2 font-13">
                                                <strong>Numéro Mobile :</strong>
                                                <span class = "ms-2">{{auth()->user()->getFormattedMobileUserAttribute()}}</span>
                                            </p>
                                            <p class = "text-muted mb-2 font-13">
                                                <strong>Email :</strong> 
                                                <span class = "ms-2 ">{{auth()->user()->getEmailUserAttribute()}}</span>
                                            </p>
                                            <p class = "text-muted mb-1 font-13"><strong>
                                                Adresse :</strong>
                                                <span class = "ms-2">{{auth()->user()->getAdresseUserAttribute()}}</span>
                                            </p>
                                        </div>
                                        <ul class = "social-list list-inline mt-3 mb-0">
                                            <li class = "list-inline-item">
                                                <a href = "{{$reseaux_sociaux->getLinkFacebookAttribute()}}" class = "social-list-item border-primary text-primary"  target = "_blank">
                                                    <i class = "mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class = "list-inline-item">
                                                <a href = "{{$reseaux_sociaux->getLinkInstagramAttribute()}}" class = "social-list-item border-danger text-danger"  target = "_blank">
                                                    <i class = "mdi mdi-instagram"></i>
                                                </a>
                                            </li>
                                            <li class = "list-inline-item">
                                                <a href = "{{$reseaux_sociaux->getLinkLinkedinAttribute()}}" class = "social-list-item border-info text-info"  target = "_blank">
                                                    <i class = "mdi mdi-linkedin"></i>
                                                </a>
                                            </li>
                                            <li class = "list-inline-item">
                                                <a href = "{{$reseaux_sociaux->getLinkGithubAttribute()}}" class = "social-list-item border-secondary text-secondary"  target = "_blank">
                                                    <i class = "mdi mdi-github"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class = "col-xl-8 col-lg-7">
                                <div class = "card">
                                    <div class = "card-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class = "footer">
                @include("Layouts.footer_site")
            </footer>
            @include("Layouts.right_navbar_site")
        </div>
        <div class = "rightbar-overlay"></div>
        @include("Layouts.script_site")
    </body>
</html>