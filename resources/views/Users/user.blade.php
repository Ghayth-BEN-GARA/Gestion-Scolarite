<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Utilisateur | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Utilisateur</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Utilisateur</h4>
                                </div>
                            </div>
                        </div>
                        @if($user != null)
                            <div class = "row">
                                <div class = "col-xl-4 col-lg-5">
                                    <div class = "card text-center">
                                        <div class = "card-body">
                                            <img src = "{{URL::asset($user->getPathPhotoProfileUserAttribute())}}" class = "rounded-circle avatar-lg img-thumbnail" alt = "Photo de profil">
                                            <h4 class = "mb-0 mt-2">{{$user->getFullNameUserAttribute()}}</h4>
                                            <span class = "text-muted font-14">{{$user->getTypeUserAttribute()}}</span>
                                            <p class = "text-muted font-13 mb-2">({{$user->getTravailUserAttribute()}})</p>
                                            <div class = "text-start mt-3">
                                                <h4 class = "font-13 text-uppercase">À propos :</h4>
                                                <p class = "text-muted font-13 mb-3">
                                                    Bonjour, je m'appelle {{$user->getFullNameUserAttribute()}}, je suis un {{$user->getTypeUserAttribute()}} à l'université Sesame. J'habite à {{$user->getAdresseUserAttribute()}}.
                                                </p>
                                                <p class = "text-muted mb-2 font-13">
                                                    <strong>Nom Complet :</strong>
                                                    <span class = "ms-2">{{$user->getFullNameUserAttribute()}}</span>
                                                </p>
                                                <p class = "text-muted mb-2 font-13">
                                                    <strong>Numéro Mobile :</strong>
                                                    <span class = "ms-2">{{$user->getFormattedMobileUserAttribute()}}</span>
                                                </p>
                                                <p class = "text-muted mb-2 font-13">
                                                    <strong>Email :</strong> 
                                                    <span class = "ms-2 ">{{$user->getEmailUserAttribute()}}</span>
                                                </p>
                                                <p class = "text-muted mb-1 font-13"><strong>
                                                    Adresse :</strong>
                                                    <span class = "ms-2">{{$user->getAdresseUserAttribute()}}</span>
                                                </p>
                                            </div>
                                            <ul class = "social-list list-inline mt-3 mb-0">
                                                <li class = "list-inline-item">
                                                    <a href = "{{$user->link_facebook}}" class = "social-list-item border-primary text-primary"  target = "_blank">
                                                        <i class = "mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class = "list-inline-item">
                                                    <a href = "{{$user->link_instagram}}" class = "social-list-item border-danger text-danger"  target = "_blank">
                                                        <i class = "mdi mdi-instagram"></i>
                                                    </a>
                                                </li>
                                                <li class = "list-inline-item">
                                                    <a href = "{{$user->link_linkedin}}" class = "social-list-item border-info text-info"  target = "_blank">
                                                        <i class = "mdi mdi-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li class = "list-inline-item">
                                                    <a href = "{{$user->link_github}}" class = "social-list-item border-secondary text-secondary"  target = "_blank">
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
                                            <ul class = "nav nav-pills bg-nav-pills nav-justified mb-3">
                                                <li class = "nav-item">
                                                    <a href = "#informations" data-bs-toggle = "tab" aria-expanded = "true" class = "nav-link rounded-0 active">
                                                        Informations
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class = "tab-content">
                                                <div class = "tab-pane show active" id = "informations">
                                                    <h5 class = "mb-3 mt-3 text-uppercase bg-light p-2">
                                                        <i class = "mdi mdi-account-circle me-1"></i> 
                                                        Informations Personnelles
                                                    </h5>
                                                    <div class = "row col-md-12 mb-3">
                                                        <div class = "col-md-7">
                                                            <p>
                                                                <i class = "mdi mdi-account me-1"></i>
                                                                <b class = "text-capitalize">Utilisateur :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                {{$user->getFullNameUserAttribute()}}
                                                            </span>
                                                        </div>
                                                        <div class = "col-md-5">
                                                            <p>
                                                                <i class = "mdi mdi-calendar me-1"></i>
                                                                <b class = "text-capitalize">Date de naissance :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                <?php
                                                                    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                    echo utf8_encode($user->getFormattedDateNaissanceUserAttribute())
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr class = "mb-3">
                                                    <div class = "row col-md-12 mb-3">
                                                        <div class = "col-md-7">
                                                            <p>
                                                                <i class = "mdi mdi-gender-male-female me-1"></i>
                                                                <b class = "text-capitalize">Genre :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                {{$user->getGenreUserAttribute()}}
                                                            </span>
                                                        </div>
                                                        <div class = "col-md-5">
                                                            <p>
                                                                <i class = "mdi mdi-home me-1"></i>
                                                                <b class = "text-capitalize">Adresse :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                {{$user->getAdresseUserAttribute()}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr class = "mb-3">
                                                    <div class = "row col-md-12 mb-3">
                                                        <div class = "col-md-7">
                                                            <p>
                                                                <i class = "mdi mdi-briefcase me-1"></i>
                                                                <b class = "text-capitalize">Travail :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                {{$user->getTravailUserAttribute()}}
                                                            </span>
                                                        </div>
                                                        <div class = "col-md-5">
                                                            <p>
                                                                <i class = "mdi mdi-account-box-outline me-1"></i>
                                                                <b class = "text-capitalize">Rôle :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                {{$user->getTypeUserAttribute()}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr class = "mb-3">
                                                    <div class = "row col-md-12 mb-3">
                                                        <div class = "col-md-7">
                                                            <p>
                                                                <i class = "mdi mdi-calendar me-1"></i>
                                                                <b class = "text-capitalize">Date De Création :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                <?php
                                                                    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                    echo utf8_encode($user->getFormattedDateCreationUserAttribute())
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <h5 class = "mb-3 mt-3 text-uppercase bg-light p-2">
                                                        <i class = "mdi mdi-card-account-phone me-1"></i> 
                                                        Contact
                                                    </h5>
                                                    <div class = "row col-md-12 mb-3">
                                                        <div class = "col-md-7">
                                                            <p>
                                                                <i class = "mdi mdi-email me-1"></i>
                                                                <b class = "text-capitalize">Adresse Email :</b>
                                                            </p>
                                                            <span class = "mx-3">
                                                                {{$user->getEmailUserAttribute()}}
                                                            </span>
                                                        </div>
                                                        <div class = "col-md-5">
                                                            <p>
                                                                <i class = "mdi mdi-cellphone me-1"></i>
                                                                <b class = "text-capitalize">Numéro Mobile :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                {{$user->getFormattedMobileUserAttribute()}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <h5 class = "mb-3 mt-3 text-uppercase bg-light p-2">
                                                        <i class = "mdi mdi-earth me-1"></i> 
                                                        Réseaux sociaux
                                                    </h5>
                                                    <div class = "row col-md-12 mb-3">
                                                        <div class = "col-md-7">
                                                            <p>
                                                                <i class = "mdi mdi-facebook me-1"></i>
                                                                <b class = "text-capitalize">Facebook :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                <a href = "{{$user->link_facebook}}" target = "_blank">{{$user->getFullnameUserAttribute()}}</a>
                                                            </span>
                                                        </div>
                                                        <div class = "col-md-5">
                                                            <p>
                                                                <i class = "mdi mdi-facebook me-1"></i>
                                                                <b class = "text-capitalize">Instagram :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                <a href = "{{$user->link_instagram}}" target = "_blank">{{$user->getFullnameUserAttribute()}}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr class = "mb-3">
                                                    <div class = "row col-md-12 mb-3">
                                                        <div class = "col-md-7">
                                                            <p>
                                                                <i class = "mdi mdi-linkedin me-1"></i>
                                                                <b class = "text-capitalize">Linkedin :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                <a href = "{{$user->link_linkedin}}" target = "_blank">{{$user->getFullnameUserAttribute()}}</a>
                                                            </span>
                                                        </div>
                                                        <div class = "col-md-5">
                                                            <p>
                                                                <i class = "mdi mdi-github me-1"></i>
                                                                <b class = "text-capitalize">Github :</b>
                                                            </p>
                                                            <span class = "mx-3 text-capitalize">
                                                                <a href = "{{$user->link_github}}" target = "_blank">{{$user->getFullnameUserAttribute()}}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class = "row justify-content-center">
                            <div class = "col-lg-4">
                                <div class = "text-center">
                                    <img src = "{{asset('/images/not_found.png')}}" height = "200" alt = "Image introuvable">
                                    <h2 class = "text-error mt-0">404</h2>
                                    <h4 class = "text-uppercase text-danger mt-3">Page Introuvable</h4>
                                    <p class = "text-muted mt-2">
                                        Malheureusement, nous n'avons pas trouvé de compte avec cet identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
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