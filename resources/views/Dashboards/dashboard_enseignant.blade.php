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
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "page-title-box">
                                    <div class = "page-title-right">
                                        <form class = "d-flex">
                                            <div class = "input-group">
                                                @if(App\Http\Controllers\DashboardController::getAnneeUniversitaireActuel() != null)
                                                    <input type = "text" class = "form-control form-control-light" id = "dash-daterange" value = "Actuel : {{App\Http\Controllers\DashboardController::getAnneeUniversitaireActuel()->debut_annee_universitaire}} - {{App\Http\Controllers\DashboardController::getAnneeUniversitaireActuel()->fin_annee_universitaire}}" disabled>
                                                @else
                                                    <input type = "text" class = "form-control form-control-light" id = "dash-daterange" value = "Non définie" disabled>
                                                @endif
                                                <span class = "input-group-text bg-primary border-primary text-white">
                                                    <i class = "mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <h4 class = "page-title text-blue">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "row">
                        <livewire:statistiques-enseignant-livewire/>
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