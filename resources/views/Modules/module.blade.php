<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Module | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Module</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Module</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Module</h4>
                                        <p class = "text-muted font-14">
                                            Consultation des informations de ce module qui est enregistré dans notre système.
                                        </p>
                                        @if($module != null)
                                            <table class = "table table-bordered table-centered mb-0">
                                                <thead>
                                                    <tr class = "text-center">
                                                        <th>Identifiant</th>
                                                        <th>Nom</th>
                                                        <th>Description</th>
                                                        <th>Coefficient</th>
                                                        <th>Nombre d'heure</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class = "text-center">
                                                        <td>{{$module->getIdModuleAttribute()}}</td>
                                                        <td>{{$module->getNomModuleAttribute()}}</td>
                                                        <td>{{$module->getDescriptionModuleAttribute()}}</td>
                                                        <td>{{$module->getCoefficientModuleAttribute()}}</td>
                                                        <td>{{$module->getNombreHeureModuleAttribute()}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @else
                                            <div class = "row justify-content-center">
                                                <div class = "col-lg-4">
                                                    <div class = "text-center">
                                                        <img src = "{{asset('/images/not_found.png')}}" height = "200" alt = "Image introuvable">
                                                        <h2 class = "text-error mt-0">404</h2>
                                                        <h4 class = "text-uppercase text-danger mt-3">Page Introuvable</h4>
                                                        <p class = "text-muted mt-2">
                                                            Malheureusement, nous n'avons pas trouvé un module avec cette identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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