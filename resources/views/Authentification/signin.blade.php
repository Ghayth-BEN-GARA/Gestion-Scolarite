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
                        <form method = "post" class = "register-form" id = "login-form" name = "login-form" action = "{{url('/login')}}">
                            @csrf
                            <h2>Connexion</h2>
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
                                    <input class = "form-check-input" type = "checkbox" name = "souviens_de_moi" id = "souviens_de_moi" value = "Souviens De Moi" required>
                                    <label class = "form-check-label mt-2" for = "souviens_de_moi">Souviens De Moi</label>
                                </div>
                                <div class = "form-group mt-2">
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