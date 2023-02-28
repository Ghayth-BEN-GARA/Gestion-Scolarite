<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Nouvel Utilisateur | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Nouvel Utilisateur</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Nouvel Utilisateur</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Nouvel Utilisateur</h4>
                                        <p class = "text-muted font-14">
                                            Créez un nouvel utilisateur en ajoutant les informations requises pour chaque utilisateur. Cet utilisateur peut être un admin, un comptable, un étudiant, un enseignant ou un parent.
                                        </p>
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
                                        @elseif(Session()->has("success"))
                                            <div class = "alert alert-success d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    {{session()->get('success')}}
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @endif
                                        <form name = "f-form-ajouter-user" id  = "f-form-ajouter-user" method = "post" action = "{{url('/creer-user')}}" onsubmit = "validerFormulaireCreerUtilisateur()">
                                            {{ csrf_field() }}
                                            <h5 class = "mb-3 mt-3 text-uppercase p-2">
                                                <i class = "mdi mdi-account-circle me-1"></i> 
                                                Informations Personnelles
                                            </h5>
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "nom" class = "form-label">Nom</label>
                                                        <input type = "text" class = "form-control" id = "nom" name = "nom" placeholder = "Saisissez le nom.." required>
                                                    </div>
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "prenom" class = "form-label">Prénom</label>
                                                        <input type = "text" class = "form-control" id = "prenom" name = "prenom" placeholder = "Saisissez le prénom.." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "date_naissance" class = "form-label">Date De Naissance</label>
                                                        <input type = "date" class = "form-control" id = "date_naissance" name = "date_naissance" placeholder = "Saisissez le date de naissance.." required>
                                                    </div>
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "travail" class = "form-label">Travail</label>
                                                        <input type = "text" class = "form-control" id = "travail" name = "travail" placeholder = "Saisissez le travail.." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "genre" class = "form-label">Genre</label>
                                                        <select class = "form-select" id = "genre" name = "genre" required>
                                                            <option value = "#" selected disabled>Sélectionnez le genre..</option>
                                                            <option value = "Femme">Femme</option>
                                                            <option value = "Homme">Homme</option>
                                                            <option value = "Non spécifié">Non spécifié</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "role" class = "form-label">Rôle</label>
                                                        <select class = "form-select" id = "role" name = "role" required>
                                                            <option value = "#" selected disabled>Sélectionnez le rôle..</option>
                                                            <option value = "Admin">Admin</option>
                                                            <option value = "Comptable">Comptable</option>
                                                            <option value = "Enseignant">Enseignant</option>
                                                            <option value = "Etudiant">Etudiant</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class = "mb-3 mt-3 text-uppercase p-2">
                                                <i class = "mdi mdi-map-marker me-1"></i> 
                                                Location
                                            </h5>
                                            <div class = "row">
                                                <div class = "col-md-12">
                                                    <div class = "mb-3">
                                                        <label for = "adresse" class = "form-label">Adresse</label>
                                                        <textarea class = "form-control" id = "adresse" name = "adresse" placeholder = "Saisissez l'adresse.." rows = "4" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class = "mb-3 mt-3 text-uppercase p-2">
                                                <i class = "mdi mdi-card-account-phone me-1"></i> 
                                                Contact
                                            </h5>
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "email" class = "form-label">Adresse Email</label>
                                                        <input type = "email" class = "form-control" id = "email" name = "email" placeholder = "Saisissez l'adresse email.." required>
                                                    </div>
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "numero_mobile" class = "form-label">Numéro Mobile</label>
                                                        <input type = "phone" class = "form-control" id = "numero_mobile" name = "numero_mobile" placeholder = "Saisissez le numéro mobile.." onKeyPress = "if(this.value.length==8) return false; return event.charCode>=48 && event.charCode<=57" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class = "mb-3 mt-3 text-uppercase p-2">
                                                <i class = "mdi mdi-lock me-1"></i> 
                                                Sécurité
                                            </h5>
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "password" class = "form-label">Mot De Passe</label>
                                                        <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Saisissez le mot de passe.." required>
                                                    </div>
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "confirm_password" class = "form-label">Confirmation De Mot De Passe</label>
                                                        <input type = "password" class = "form-control" id = "confirm_password" name = "confirm_password" placeholder = "Confirmez le mot de passe.." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "text-end">
                                                <button type = "submit" class = "btn btn-primary mt-2">
                                                    <i class = "mdi mdi-account-plus"></i> 
                                                    Créer
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
            <footer class = "footer">
                @include("Layouts.footer_site")
            </footer>
            @include("Layouts.right_navbar_site")
        </div>
        <div class = "rightbar-overlay"></div>
        @include("Layouts.script_site")
    </body>
</html>