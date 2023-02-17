<!DOCTYPE html>
<html lang = "en">
    @include("Layouts.head_authentification")
    <title>Modification Du Mot De Passe | Université Sesame</title>
    <body>
        <div class = "main">
            <div class = "container">
                <div class = "signup-content">
                    <div class = "signup-img">
                        <img src = "{{asset('/login/images/signup-img.jpg')}}" alt = "Image d'authentification">
                    </div>
                    <div class = "signup-form">
                        <form method = "post" class = "register-form" id = "login-form" name = "login-form" action = "{{url('/update-reset-password-user')}}">
                            {{ csrf_field() }}
                            <h2>Modifier Le Mot De Passe</h2>
                            <p class = "text-muted mb-4">
                                Merci d'entrer votre nouveau mot de passe pour accéder à votre compte.
                            </p>
                            @if(!$verifier_token || $token != $_GET['token'] || $id_user != $_GET['id_user'])
                                <div class = "alert alert-danger d-flex alert-dismissible fade show mt-1" role = "alert">
                                    <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                        <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <span class = "d-flex justify-content-start">
                                        Assurez-vous que vous avez cliqué sur le lien de récupération et réessayez.
                                    </span>
                                    <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                </div>
                            @else
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
                                @endif
                            <div class = "form-group">
                                <label for = "address_email">Mot De Passe :</label>
                                <input type = "password" name = "password" id = "password" placeholder = "Saisissez votre nouveau mot de passe.." required/>
                            </div>
                            <div class = "form-group">
                                <label for = "address_email">Confirmez Le Mot De Passe :</label>
                                <input type = "password" name = "confirm_password" id = "confirm_password" placeholder = "Confirmez votre nouveau mot de passe.." required/>
                            </div>
                            <input type = "hidden" name = "id_user" id = "id_user" placeholder = "Saisissez votre identifiant.." value = "{{$_GET['id_user']}}" required/>
                            <div class = "form-submit">
                                <input type = "submit" value = "Modifier " class = "submit" name = "submit" id = "submit" />
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include("Layouts.script_authentification")
    </body>
</html>