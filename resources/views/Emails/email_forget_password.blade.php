<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content="ie=edge">
        <meta http-equiv = "Content-Security-Policy" content = "upgrade-insecure-requests">
        <meta http-equiv = "Content-type" content = "text/html; charset=utf-8"/>
        <link rel = "icon" href = "{{asset('/images/favicon.png')}}">
        <title>Email De Réinitialisation Du Mot De Passe | Université Sesame</title>
    </head>
    <body style = "margin: 0; font-family: Nunito, sans-serif; font-size: 0.9rem; font-weight: 400; line-height: 1.5; color: #6c757d; background-color: #fafbfe; -webkit-text-size-adjust: 100%; -webkit-tap-highlight-color: transparent;">
        <div style = "--bs-gutter-x: 0px; --bs-gutter-y: 0; display: -webkit-box; display: -ms-flexbox; display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap; margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) * -0.5); margin-left: calc(var(--bs-gutter-x) * -0.5);">
            <div style = "-webkit-box-flex: 0; -ms-flex: 0 0 auto; flex: 0 0 auto; width: 100%;">
                <div style = "position: relative; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; min-width: 0; word-wrap: break-word; background-color: #fff; background-clip: border-box; border: 1px solid #eef2f7; border-radius: 0.25rem;">
                    <div style = "-webkit-box-flex: 1; -ms-flex: 1 1 auto; flex: 1 1 auto; padding: 1.5rem 1.5rem;">
                        <div style = "margin: -1.5rem 0 -1.5rem 250px; padding: 1.5rem 0 1.5rem 25px;">
                            <div style = "margin-top: 1.5rem !important;">
                                <h5 style = "margin-top: 0; margin-bottom: 0.75rem; font-weight: 500; line-height: 1.1; font-size: 0.9375rem; margin: 10px 0; font-weight: 700; font-size: 18px !important;">Réinitialisation du mot de passe !</h5>
                                <hr style = "margin: 1rem 0; color: inherit; background-color: currentColor; border: 0; opacity: 0.25; height: 1px;">
                                <div style = "display: -webkit-box !important; display: -ms-flexbox !important; display: flex !important; margin-bottom: 1.5rem !important; margin-top: 0.375rem !important;">
                                    <img style = " display: -webkit-box !important; display: -ms-flexbox !important; display: flex !important; argin-right: 0.75rem !important; border-radius: 50% !important;" src = "{{asset('https://www.ecoles.com.tn/sites/default/files/universite/logo/sesame_logo.jpg')}}" alt = "Photo de user.png" height = "80"/>
                                    <div style = "width: 100% !important; overflow: hidden !important;">
                                        <small style = "font-size: 0.75rem; float: right !important; text-transform: capitalize">
                                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                                        </small>
                                        <h6 style = "margin-top: 0; margin-bottom: 0.75rem; font-weight: 500; font-size: 0.75rem;  margin: 10px 0; font-weight: 700;  line-height: 1.1; margin-left:3px; margin-top: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; font-size: 14px !important;">Université Sesame</h6>
                                        <small style = "font-size: 0.75rem; color: #98a6ad !important; margin-left:3px;">De : test.utilisateur012@gmail.com</small>
                                    </div>
                                </div>
                                <p style = "margin-top: 0; margin-bottom: 1rem;">Bonjour M. {{$mailData['fullname']}}, </p>
                                <p style = "margin-top: 0; margin-bottom: 1rem;">
                                    Nous avons reçu une demande de réinitialisation du mot de passe de ce compte de plateforme associé à <b>{{$mailData['email']}}</b>. Aucune modification n'a encore été apportée à votre compte.
                                    <br><br>
                                    Vous pouvez réinitialiser votre mot de passe en cliquant sur le lien ci-dessous :
                                    <div style = "text-align: left; padding-top: 15px; padding-bottom: 15px;">
                                        <a href = "http://127.0.0.1:8000/reset-password?token={{$mailData['token']}}&id_user={{$mailData['id_user']" style = "text-decoration:none; width: auto; height: 30px; display: inline-block; font-family: Nunito, sans-serif; font-weight: 700; font-size: 14px; padding: 10px; border: none; margin-left:30px; background-color: #033D89; color: #fff; text-align:center; letter-spacing:0.9px;">Réinitialisez votre mot de passe</a>
                                    </div>
                                </p>
                                <p style = "margin-top: 0; margin-bottom: 1rem;">
                                    Si vous n'avez pas demander pas de nouveau mot de passe, veuillez nous informer immédiatement en répondant à cet e-mail. Vous pouvez trouver des réponses et nous contacter à <a href = "http://127.0.0.1:8000/aide" style = "text-decoration:none; color:#033D89;">Centre d'aide</a>. Nous sommes là pour vous aider à n'importe quelle étape.
                                </p>
                                <hr style = "margin: 1rem 0; color: inherit; background-color: currentColor; border: 0; opacity: 0.25; height: 1px;">
                                <p style = "margin-top: 0; margin-bottom: 1rem;">
                                    Copyright © <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%B %Y",strtotime(strftime(date('Y-m-d')))));?> <b> Université Sesame </b>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>