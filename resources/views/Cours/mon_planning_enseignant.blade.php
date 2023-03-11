<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <link rel = "stylesheet" href = "{{asset('/css/vendor/fullcalendar.min.css')}}">
        <title>Planning | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Planning</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Planning</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <div class = "row">
                                            <div class = "col-lg-3">
                                                <div class = "d-grid">
                                                    <a href = "{{url('/add-seance-enseignant')}}" class = "btn btn-lg font-16 btn-primary">
                                                        <i class = "mdi mdi-plus-circle-outline"></i>
                                                        Créer une séance
                                                    </a>
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
        <script src = "{{asset('/js/vendor/fullcalendar.min.js')}}"></script>
    </body>
</html>