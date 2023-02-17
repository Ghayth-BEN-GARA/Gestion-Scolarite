<!DOCTYPE html>
<html lang = "en">
    @include("Layouts.head_authentification")
    <title>Récupération Du Compte | Université Sesame</title>
    <body>
        <div class = "main">
            <div class = "container">
                <div class = "signup-content">
                    <div class = "signup-img">
                        <img src = "{{asset('/login/images/signup-img.jpg')}}" alt = "Image d'authentification">
                    </div>
                    <div class = "signup-form">
                        <form method = "post" class = "register-form" id = "login-form" name = "login-form" action = "{{url('/recuperation-compte')}}">
                            {{ csrf_field() }}
                            <h2>Réinitialiser Le Mot De Passe</h2>
                            <p class = "text-muted mb-4">
                                Entrez votre adresse e-mail et nous vous enverrons un e-mail avec des instructions pour réinitialiser votre mot de passe.
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
                            @elseif(Session()->has("deleted"))
                                <div class = "alert alert-primary d-flex alert-dismissible fade show mt-1" role = "alert">
                                    <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                        <path d = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                    <span class = "d-flex justify-content-start">
                                        {{session()->get('deleted')}}
                                    </span>
                                    <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                </div>
                            @elseif(Session()->has("link_sent"))
                                <div class = "alert alert-warning d-flex alert-dismissible fade show mt-1" role = "alert">
                                    <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                        <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <span class = "d-flex justify-content-start">
                                        Un email a été envoyé à l'adresse <strong>{{session()->get('email')}}</strong>. Veuillez rechercher un e-mail de la plateforme et cliquez sur le lien inclus pour réinitialiser votre mot de passe.
                                    </span>
                                    <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                </div>
                            @endif
                            <div class = "form-group">
                                <label for = "address_email">Adresse Email :</label>
                                <input type = "email" name = "email" id = "email" placeholder = "Saisissez votre adresse email.." required/>
                            </div>
                            <div class = "form-submit">
                                <a href = "{{url('/')}}" class = "secondary" id = "secondary">Retour</a>
                                <input type = "submit" value = "Réinitialiser " class = "submit" name = "submit" id = "submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include("Layouts.script_authentification")
    </body>
</html>