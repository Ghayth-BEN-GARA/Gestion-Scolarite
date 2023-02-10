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
                                        <div class = "tab-content">
                                            <div class = "tab-pane show active" id = "billing-information">
                                                <div class = "row">
                                                    <div class = "col-lg-7">
                                                        <form class = "form-contact" id = "form-contact" method = "post" action = "#">
                                                            @csrf
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
                                                                        <textarea class = "form-control" id = "message" rows = "6" placeholder = "Saisissez votre message.." required></textarea>
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