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
                                        <a href = "{{url('/edit-photo-profil')}}" class = "btn btn-success btn-sm mb-2">Modifier</a>
                                        <div class = "text-start mt-3">
                                            <h4 class = "font-13 text-uppercase">À propos de moi :</h4>
                                            <p class = "text-muted font-13 mb-3">
                                                Bonjour, je m'appelle {{auth()->user()->getFullNameUserAttribute()}}, je suis un {{auth()->user()->getTypeUserAttribute()}} à l'université Sesame. J'habite à {{auth()->user()->getAdresseUserAttribute()}}.
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
                                        <ul class = "nav nav-pills bg-nav-pills nav-justified mb-3">
                                            <li class = "nav-item">
                                                <a href = "#informations" data-bs-toggle = "tab" aria-expanded = "true" class = "nav-link rounded-0 active">
                                                    Informations
                                                </a>
                                            </li>
                                            <li class = "nav-item">
                                                <a href = "#modifier_informations" data-bs-toggle = "tab" aria-expanded = "false" class = "nav-link rounded-0">
                                                    Modifier Les Informations
                                                </a>
                                            </li>
                                            <li class = "nav-item">
                                                <a href = "#securite" data-bs-toggle = "tab" aria-expanded = "false" class = "nav-link rounded-0">
                                                    Sécurité
                                                </a>
                                            </li>
                                        </ul>
                                        <div class = "tab-content">
                                            <div class = "tab-pane show active" id = "informations">
                                                @if(Session()->has("erreur"))
                                                    <div class = "alert alert-danger d-flex alert-dismissible fade show mt-1" role = "alert">
                                                        <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                            <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                        </svg>
                                                        <span class = "d-flex justify-content-start">
                                                            {{session()->get('erreur')}}
                                                        </span>
                                                        <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                                    </div>
                                                @elseif(Session()->has("succes"))
                                                    <div class = "alert alert-success d-flex alert-dismissible fade show mt-1" role = "alert">
                                                        <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                            <path d = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                        </svg>
                                                        <span class = "d-flex justify-content-start">
                                                            {{session()->get('succes')}}
                                                        </span>
                                                        <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                                    </div>
                                                @endif
                                                <h5 class = "mb-4 text-uppercase">
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
                                                            {{auth()->user()->getFullNameUserAttribute()}}
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
                                                                echo utf8_encode(auth()->user()->getFormattedDateNaissanceUserAttribute())
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
                                                            {{auth()->user()->getGenreUserAttribute()}}
                                                        </span>
                                                    </div>
                                                    <div class = "col-md-5">
                                                        <p>
                                                            <i class = "mdi mdi-home me-1"></i>
                                                            <b class = "text-capitalize">Adresse :</b>
                                                        </p>
                                                        <span class = "mx-3 text-capitalize">
                                                            {{auth()->user()->getAdresseUserAttribute()}}
                                                        </span>
                                                    </div>
                                                </div>
                                                <hr class = "mb-3">
                                                <div class = "row col-md-12 mb-3">
                                                    <div class = "col-md-7">
                                                        <p>
                                                            <i class = "mdi mdi-cellphone me-1"></i>
                                                            <b class = "text-capitalize">Numéro Mobile :</b>
                                                        </p>
                                                        <span class = "mx-3 text-capitalize">
                                                            {{auth()->user()->getFormattedMobileUserAttribute()}}
                                                        </span>
                                                    </div>
                                                    <div class = "col-md-5">
                                                        <p>
                                                            <i class = "mdi mdi-briefcase me-1"></i>
                                                            <b class = "text-capitalize">Travail :</b>
                                                        </p>
                                                        <span class = "mx-3 text-capitalize">
                                                            {{auth()->user()->getTravailUserAttribute()}}
                                                        </span>
                                                    </div>
                                                </div>
                                                <hr class = "mb-3">
                                                <div class = "row col-md-12 mb-3">
                                                    <div class = "col-md-7">
                                                        <p>
                                                            <i class = "mdi mdi-email me-1"></i>
                                                            <b class = "text-capitalize">Adresse Email :</b>
                                                        </p>
                                                        <span class = "mx-3">
                                                            {{auth()->user()->getEmailUserAttribute()}}
                                                        </span>
                                                    </div>
                                                    <div class = "col-md-5">
                                                        <p>
                                                            <i class = "mdi mdi-calendar me-1"></i>
                                                            <b class = "text-capitalize">Date de création :</b>
                                                        </p>
                                                        <span class = "mx-3 text-capitalize">
                                                            <?php
                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                echo utf8_encode(auth()->user()->getFormattedDateCreationUserAttribute())
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "tab-pane" id = "modifier_informations">
                                                <form name = "f-form-modifier-informations" id  = "f-form-modifier-informations" method = "post" action = "{{url('/modifier-informations-profil')}}">
                                                    {{ csrf_field() }}
                                                    <h5 class = "mb-4 text-uppercase">
                                                        <i class = "mdi mdi-account-edit me-1"></i> 
                                                        Modifier Les Informations
                                                    </h5>
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "nom" class = "form-label">Nom</label>
                                                                <input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Saisissez votre nom.." value = "{{auth()->user()->getNomUserAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "prenom" class = "form-label">Prénom</label>
                                                                <input type = "text" class = "form-control" id = "prenom" name = "prenom" placeholder = "Saisissez votre prénom.." value = "{{auth()->user()->getPrenomUserAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "date_naissance" class = "form-label">Date De Naissance</label>
                                                                <input type = "date" class = "form-control" id = "date_naissance" name = "date_naissance" placeholder = "Saisissez votre date de naissance.." value = "{{auth()->user()->getDateNaissanceUserAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "genre" class = "form-label">Genre</label>
                                                                <select class = "form-select" id = "genre" name = "genre" required>
                                                                    <option value = "#" selected disabled>Sélectionnez votre genre..</option>
                                                                    <option value = "Femme" <?php echo !auth()->user()->getGenreUserAttribute() == null && auth()->user()->getGenreUserAttribute() == 'Femme' ? 'selected' : '' ?>>Femme</option>
                                                                    <option value = "Homme" <?php echo !auth()->user()->getGenreUserAttribute() == null && auth()->user()->getGenreUserAttribute() == 'Homme' ? 'selected' : '' ?>>Homme</option>
                                                                    <option value = "Non spécifié" <?php echo !auth()->user()->getGenreUserAttribute() == null && auth()->user()->getGenreUserAttribute() == 'Non spécifié' ? 'selected' : ''; ?>>Non spécifié</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "mobile" class = "form-label">Mobile</label>
                                                                <input type = "phone" class = "form-control" id = "mobile" name = "mobile" placeholder = "Saisissez votre numéro mobile.." value = "{{auth()->user()->getMobileUserAttribute()}}" onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "travail" class = "form-label">Travail</label>
                                                                <input type = "text" class = "form-control" id = "travail" name = "travail" placeholder = "Saisissez votre travail.." value = "{{auth()->user()->getTravailUserAttribute()}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-md-12">
                                                            <div class = "mb-3">
                                                                <label for = "adresse" class = "form-label">Adresse</label>
                                                                <textarea class = "form-control" id = "adresse" name = "adresse" placeholder = "Saisissez votre adresse.." rows = "4" required>{{auth()->user()->getAdresseUserAttribute()}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "text-end">
                                                        <button type = "submit" class = "btn btn-primary mt-2">
                                                            <i class = "mdi mdi-content-save"></i> 
                                                            Modifier
                                                        </button>
                                                    </div>
                                                </form>
                                                <h5 class = "mb-3 mt-3 text-uppercase bg-light p-2">
                                                    <i class = "mdi mdi-earth me-1"></i> 
                                                    Réseaux sociaux
                                                </h5>
                                                <form name = "f-form-modifier-reseaux-sociaux" id  = "f-form-modifier-reseaux-sociaux" method = "post" action = "{{url('/modifier-reseaux-sociaux-profil')}}">
                                                    {{ csrf_field() }}
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "facebook" class = "form-label">Facebook</label>
                                                                <div class = "input-group">
                                                                    <span class = "input-group-text">
                                                                        <i class = "mdi mdi-facebook"></i></span>
                                                                        <input type = "url" class = "form-control" id = "facebook" name = "facebook" placeholder = "Saisissez le lien de votre compte.." value = "{{$reseaux_sociaux->getLinkFacebookAttribute()}}" required>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "instagram" class = "form-label">Instagram</label>
                                                                <div class = "input-group">
                                                                    <span class = "input-group-text">
                                                                        <i class = "mdi mdi-instagram"></i></span>
                                                                        <input type = "url" class = "form-control" id = "instagram" name = "instagram" placeholder = "Saisissez le lien de votre compte.." value = "{{$reseaux_sociaux->getLinkInstagramAttribute()}}" required>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "linkedin" class = "form-label">Linkedin</label>
                                                                <div class = "input-group">
                                                                    <span class = "input-group-text">
                                                                        <i class = "mdi mdi-linkedin"></i></span>
                                                                        <input type = "url" class = "form-control" id = "linkedin" name = "linkedin" placeholder = "Saisissez le lien de votre compte.." value = "{{$reseaux_sociaux->getLinkLinkedinAttribute()}}" required>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "github" class = "form-label">Github</label>
                                                                <div class = "input-group">
                                                                    <span class = "input-group-text">
                                                                        <i class = "mdi mdi-github"></i></span>
                                                                        <input type = "url" class = "form-control" id = "github" name = "github" placeholder = "Saisissez le lien de votre compte.." value = "{{$reseaux_sociaux->getLinkGithubAttribute()}}" required>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "text-end">
                                                        <button type = "submit" class = "btn btn-primary mt-2">
                                                            <i class = "mdi mdi-content-save"></i> 
                                                            Modifier
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class = "tab-pane" id = "securite">
                                                <form name = "f-form-modifier-email" id  = "f-form-modifier-email" method = "post" action = "#">
                                                    {{ csrf_field() }}
                                                    <div class = "row">
                                                        <div class = "col-md-12">
                                                            <div class = "mb-3">
                                                                <label for = "email" class = "form-label">Adresse Email</label>
                                                                <input type = "email" class = "form-control" id = "email" name = "email" placeholder = "Saisissez votre adresse email.." value = "{{auth()->user()->getEmailUserAttribute()}}" required disabled>
                                                                <span class = "form-text text-muted">
                                                                    <small class = "text-danger">La modification de l'adresse e-mail n'est pas disponible.</small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "text-end">
                                                        <button type = "submit" class = "btn btn-primary mt-2" disabled>
                                                            <i class = "mdi mdi-content-save"></i> 
                                                            Modifier
                                                        </button>
                                                    </div>
                                                </form>
                                                <h5 class = "mb-3 mt-3 text-uppercase bg-light p-2">
                                                    <i class = "mdi mdi-lock me-1"></i> 
                                                    Mot De Passe
                                                </h5>
                                                <form name = "f-form-modifier-password" id  = "f-form-modifier-password" method = "post" action = "{{url('/modifier-password-profil')}}">
                                                    {{ csrf_field() }}
                                                    <div class = "row">
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "password" class = "form-label">Nouveau Mot De Passe</label>
                                                                <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Saisissez le nouveau mot de passe.." required>
                                                            </div>
                                                        </div>
                                                        <div class = "col-md-6">
                                                            <div class = "mb-3">
                                                                <label for = "confirm_password" class = "form-label">Confirmation Du Mot De Passe</label>
                                                                <input type = "password" class = "form-control" id = "confirm_password" name = "confirm_password" placeholder = "Confirmez le nouveau mot de passe.." required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "text-end">
                                                        <button type = "submit" class = "btn btn-primary mt-2">
                                                            <i class = "mdi mdi-content-save"></i> 
                                                            Modifier
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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