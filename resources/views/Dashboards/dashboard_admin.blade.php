<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Accueil | Université Sesame</title>
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

                    </div>
                </div>
            </div>
        </div>
        <footer class = "footer">
            @include("Layouts.footer_site")
        </footer>
        @include("Layouts.right_navbar_site")
        <div class = "rightbar-overlay"></div>
        @include("Layouts.script_site")
    </body>
</html>