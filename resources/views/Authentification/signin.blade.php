<!DOCTYPE html>
<html lang = "en">
    @include("Layouts.head_authentification")
    <title>Connexion | Université Sesame</title>
    <body>
        <div class = "main">
            <div class = "container">
                <div class = "signup-content">
                    <div class = "signup-img">
                        <img src = "{{asset('/login/images/signup-img.jpg')}}" alt = "Image d'authentification">
                    </div>
                    <div class = "signup-form">
                        <form method = "post" class = "register-form" id = "login-form" name = "login-form" action = "{{url('/login-user')}}">
                            @csrf
                            <h2>Connexion</h2>
                            @if(Session()->has("erreur"))
                                <div class = "alert alert-danger alert-dismissible fade show mt-1" role = "alert">
                                    <svg class = "bi flex-shrink-0 me-2" width = "24" height = "24" role = "img" aria-label = "Danger:">
                                        <use xlink:href = "#exclamation-triangle-fill"/>
                                    </svg>
                                    <span class = "d-flex justify-content-start">
                                        {{session()->get('erreur')}}
                                    </span>
                                    <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                </div>
                            @endif
                            <div class = "form-group">
                                <label for = "address_email">Adresse Email :</label>
                                <input type = "email" name = "email" id = "email" placeholder = "Saisissez votre adresse email.." required/>
                            </div>
                            <div class = "form-group">
                                <label for = "mot_de_passe">Mot De Passe :</label>
                                <input type = "password" name = "password" id = "password" placeholder = "Saisissez votre mot de passe.." required/>
                            </div>
                            <div class = "form-row">
                                <div class = "form-check form-radio">
                                    <input class = "form-check-input" type = "checkbox" name = "souviens_de_moi" id = "souviens_de_moi" value = "Souviens De Moi">
                                    <label class = "form-check-label" for = "souviens_de_moi">Souviens De Moi</label>
                                </div>
                                <div class = "form-group">
                                    <label>
                                        <a href = "#"  class = "text-right">Mot De Passe Oublié ?</a>
                                    </label>
                                </div>
                            </div>
                            <div class = "form-submit">
                                <input type = "submit" value = "Se Connecter" class = "submit" name = "submit" id = "submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include("Layouts.script_authentification")
    </body>
</html>