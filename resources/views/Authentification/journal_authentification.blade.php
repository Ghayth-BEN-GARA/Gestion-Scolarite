<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Journal D'authentification | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Journal D'authentification</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Journal D'authentification</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Journal D'authentification</h4>
                                        <p class = "text-muted font-14">
                                            Le journal d'authentification est un espace qui vous permet de voir les actions d'authentification créées par votre compte. Si vous le souhaitez, vous pouvez effacer votre journal d'authentification en cliquant sur <b class = "text-decoration-underline">Vider le journal</b>.
                                        </p>
                                        <div class = "tab-content">
                                            <div class = "tab-pane show active" id = "responsive-preview">
                                                <div class = "table-responsive">
                                                    <table class = "table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope = "col">#</th>
                                                                <th scope = "col">Action</th>
                                                                <th scope = "col">Description</th>
                                                                <th scope = "col">Cadre Temporel</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                        </tbody>
                                                    </table>
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
        <div class = "rightbar-overlay"></div>
        @include("Layouts.script_site")
    </body>
</html>