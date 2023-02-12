<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Contact | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Contact</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Contact</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Page de contact</h4>
                                        <p class = "text-muted font-14">
                                            Si vous avez des questions, contacte de l'administration ou des informations, vous pouvez nous contacter en <b>remplissant ce formulaire de contact</b>, <b>via l'adresse e-mail</b> ou en <b>nous appelant via les numéros disponibles ici</b>.
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
                                        <div class = "tab-content">
                                            <div class = "tab-pane show active" id = "billing-information">
                                                <div class = "row">
                                                    <div class = "col-lg-7">
                                                        <form class = "form-contact" id = "form-contact" method = "post" action = "{{url('/envoyer-email-contact')}}">
                                                            {{ csrf_field() }}
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "nom" class = "form-label">Nom</label>
                                                                        <input type = "text" class = "form-control" placeholder = "Saisissez votre nom.."  name = "nom" id = "nom" required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "prenom" class = "form-label">Prénom</label>
                                                                        <input type = "text" class = "form-control" placeholder = "Saisissez votre prénom.."  name = "prenom" id = "prenom" required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "email" class = "form-label">Adresse email</label>
                                                                        <input type = "email" class = "form-control" placeholder = "Saisissez votre adresse email.."  name = "email" id = "email" required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class = "mb-3">
                                                                        <label for = "sujet" class = "form-label">Sujet</label>
                                                                        <input type = "text" class = "form-control" placeholder = "Saisissez votre sujet.."  name = "sujet" id = "sujet" required>
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-12">
                                                                    <div class = "mb-3">
                                                                        <label for = "message" class = "form-label">Message</label>
                                                                        <textarea class = "form-control" id = "message" name = "message" rows = "6" placeholder = "Saisissez votre message.." required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row mt-3">
                                                                <div class = "col-sm-6"></div>
                                                                <div class = "col-sm-6 text-end">
                                                                    <button type = "submit" class = "btn btn-primary">Envoyer</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class =  "col-lg-5">
                                                        <div class = "border p-3 mt-4 mt-lg-0 rounded">
                                                            <h4 class = "header-title mb-3">Nos Contacts</h4>
                                                            <div class = "table-responsive">
                                                                <table class = "table table-centered mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <p class = "m-0 d-inline-block align-middle">
                                                                                    <a href = "javascript:void(0)" class = "text-body fw-semibold">
                                                                                        Adresse
                                                                                    </a>
                                                                                </p>
                                                                            </td>
                                                                            <td class = "text-end">
                                                                                ZI Chotrana I – BP 4 parc technologique Elgazala – 2088 Tunisie
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <p class = "m-0 d-inline-block align-middle">
                                                                                    <a href = "javascript:void(0)" class = "text-body fw-semibold">
                                                                                        Mobile
                                                                                    </a>
                                                                                </p>
                                                                            </td>
                                                                            <td class = "text-end">
                                                                                97 397 292
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <p class = "m-0 d-inline-block align-middle">
                                                                                    <a href = "javascript:void(0)" class = "text-body fw-semibold">
                                                                                        Numéro
                                                                                    </a>
                                                                                </p>
                                                                            </td>
                                                                            <td class = "text-end">
                                                                                70 686 486
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <p class = "m-0 d-inline-block align-middle">
                                                                                    <a href = "javascript:void(0)" class = "text-body fw-semibold">
                                                                                        Fax
                                                                                    </a>
                                                                                </p>
                                                                            </td>
                                                                            <td class = "text-end">
                                                                                70 686 488
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <p class = "m-0 d-inline-block align-middle">
                                                                                    <a href = "javascript:void(0)" class = "text-body fw-semibold">
                                                                                        Email
                                                                                    </a>
                                                                                </p>
                                                                            </td>
                                                                            <td class = "text-end">
                                                                                sesame@sesame.com.tn
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "mapouter mt-3">
                                                        <div class = "gmap_canvas">
                                                            <iframe width = "100%" height = "500px" id = "gmap_canvas" src = "https://maps.google.com/maps?q=univérsité sesame&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder = "0" scrolling = "no" marginheight = "0" marginwidth = "0"></iframe>
                                                            <br>
                                                            <style>
                                                                .mapouter{
                                                                    position:relative;
                                                                    text-align:right;
                                                                    height:100%;
                                                                    width:100%;
                                                                }
                                                                .gmap_canvas {
                                                                    overflow:hidden;
                                                                    background:none!important;
                                                                    height:100%;
                                                                    width:100%;
                                                                }
                                                            </style>
                                                        </div>
                                                    </div>
                                                </div>
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