<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Séance | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Séance</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Séance</h4>
                                </div>
                            </div>
                        </div>
                        @if($seance != null)
                        <div class = "row justify-content-center">
                            <div class = "col-lg-7 col-md-10 col-sm-11">
                                <div class = "horizontal-steps mt-4 mb-4 pb-5" id = "tooltip-container">
                                    <div class = "horizontal-steps-content">
                                        @if($seance->date_seance < date('Y-m-d'))
                                            <div class = "step-item current">
                                                <span data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "bottom" title = "<?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($seance->date_seance)))); ?>">Terminée</span>
                                            </div>
                                            <div class = "step-item">
                                                <span>Aujourd'hui</span>
                                            </div>
                                            <div class = "step-item">
                                                <span>À venir</span>
                                            </div>
                                        @elseif($seance->date_seance == date('Y-m-d'))
                                            <div class = "step-item">
                                                <span>Terminée</span>
                                            </div>
                                            <div class = "step-item current">
                                                <span data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "bottom" title = "<?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($seance->date_seance)))); ?>">Aujourd'hui</span>
                                            </div>
                                            <div class = "step-item">
                                                <span>À venir</span>
                                            </div>
                                        @else
                                            <div class = "step-item">
                                                <span>Terminée</span>
                                            </div>
                                            <div class = "step-item">
                                                <span>Aujourd'hui</span>
                                            </div>
                                            <div class = "step-item current">
                                                <span data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "bottom" title = "<?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($seance->date_seance)))); ?>">À venir</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class = "row">
                                <div class = "col-lg-8">
                                    <div class = "card">
                                        <div class = "card-body">
                                            <h4 class = "header-title mb-3">Cours de {{$seance->nom_module}}</h4>
                                            <div class = "table-responsive">
                                                <table class = "table mb-0">
                                                    <thead class = "table-light">
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Début</th>
                                                            <th>Fin</th>
                                                            <th>Salle</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class = "text-capitalize">
                                                                <?php 
                                                                    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                    echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($seance->date_seance)))); 
                                                                ?>
                                                            </td>
                                                            <td>{{date('H:i', strtotime($seance->heure_debut_seance))}}</td>
                                                            <td>{{date('H:i', strtotime($seance->heure_fin_seance))}}</td>
                                                            <td>Salle N° {{$seance->numero_salle}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-lg-4">
                                    <div class = "card">
                                        <div class = "card-body">
                                            <h4 class = "header-title mb-3">Informations</h4>
                                            <div class = "table-responsive">
                                                <table class = "table mb-0">
                                                    <thead class = "table-light">
                                                        <tr>
                                                            <th>Description</th>
                                                            <th>Valeur</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Cours</td>
                                                            <td>{{$seance->nom_module}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Coefficient</td>
                                                            <td>{{$seance->coefficient_module}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nombre d'heures</td>
                                                            <td>{{$seance->nombre_heure_module}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Semestre</td>
                                                            <td>{{$seance->semestre}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enseignant</td>
                                                            <td>{{$seance->prenom}} {{$seance->nom}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Spécialité</td>
                                                            <td>{{$seance->nom_specialite}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class = "row justify-content-center">
                                <div class = "col-lg-4">
                                    <div class = "text-center">
                                        <img src = "{{asset('/images/not_found.png')}}" height = "200" alt = "Image introuvable">
                                        <h2 class = "text-error mt-0">404</h2>
                                        <h4 class = "text-uppercase text-danger mt-3">Page Introuvable</h4>
                                        <p class = "text-muted mt-2">
                                            Malheureusement, nous n'avons pas trouvé une séance avec cette identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
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