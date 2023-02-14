<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content="ie=edge">
        <meta http-equiv = "Content-Security-Policy" content = "upgrade-insecure-requests">
        <meta http-equiv = "Content-type" content = "text/html; charset=utf-8"/>
        <link rel = "icon" href = "{{asset('/images/favicon.png')}}">
        <title>Email De Création D'Un Nouvel Utilisateur | Université Sesame</title>
    </head>
    <body>
        <div style = "max-width: auto; margin: auto;">
            <div style = "margin-left: 50px; width: 80%;">
                <p style = "border: 1px solid #808080; margin-top: 40px; padding:40px">
                    <span style = "text-transform: uppercase; font-size: 16px; font-weight: 500; font-family: Quicksand, Calibri, sans-serif; font-weight:700; letter-spacing: 3px; line-height: 35px;">
                        Bonjour <b> M. {{$mailData['fullname']}},</b>
                    </span>
                    <br>
                    <span style = "color: #888888;font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                        Vous trouvez ci-dessous les paramètres d'accès à la plateforme Gestion Scolarité Sesame :
                        <br><br>
                        <b>• Adresse Du Plateforme : </b> <a href = "http://127.0.0.1:8000/" style = "text-decoration:none; color:#033D89">Gestion De Scolarité</a>
                        <br>
                        <b>• Adresse Email : </b> {{$mailData['email']}}
                        <br>
                        <b>• Mot De Passe : </b> {{$mailData['password']}}
                    </span>
                </p>
                <p style = "margin-top:80px">
                    <span style = "color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                        Vous recevez des é-mails à propos la création de votre compte.
                        Cet e-mail provient de <span style = "text-transform: capitalize;">{{$mailData['fullname']}}</span>.
                        ({{$mailData['type']}}).
                        <br>
                        Copyright © <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%B %Y",strtotime(strftime(date('Y-m-d')))));?> <b style = "color: #033D89;">Université Sesame</b>.<br><br>
                        <span style = "text-align: center; font-weight: 600;">S'il vous plait ne répondez pas à cet email.</span>
                    </span>
                </p>
            </div>
        </div>
    </body>
</html>