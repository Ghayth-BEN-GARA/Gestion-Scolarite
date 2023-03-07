<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Mes Cours | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Mes Cours</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Mes Cours</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            @if(!empty($listes_cours) && ($listes_cours->count()))
                                @foreach($listes_cours as $data)
                                    <div class = "col-xxl-8 col-xl-6">
                                        <div class = "card d-block">
                                            <div class = "card-body">
                                                <div class = "dropdown card-widgets">
                                                    <a href = "javascript:void(0)" class = "dropdown-toggle arrow-none" data-bs-toggle = "dropdown" aria-expanded = "false">
                                                        <i class = 'uil uil-ellipsis-h'></i>
                                                    </a>
                                                    <div class = "dropdown-menu dropdown-menu-end">
                                                        <a href = "javascript:void(0)" class = "dropdown-item">
                                                            <i class = 'uil uil-meeting-board me-1'></i>Informations du classe
                                                        </a>
                                                        <a href = "javascript:void(0)" class = "dropdown-item">
                                                            <i class = 'uil uil-users-alt me-1'></i>Gérer les absences
                                                        </a>
                                                        <a href = "javascript:void(0)" class = "dropdown-item">
                                                            <i class = 'uil uil-exposure-alt me-1'></i>Gérer les notes
                                                        </a>
                                                        <a href = "javascript:void(0)" class = "dropdown-item">
                                                            <i class = 'uil uil-calendar-alt me-1'></i>Consulter les séances
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class = "form-check float-start">
                                                    <input type = "checkbox" class = "form-check-input" id = "completedCheck">
                                                    <label class = "form-check-label" for = "completedCheck">
                                                        Sélectionner le cours
                                                    </label>
                                                </div>
                                                <div class = "clearfix"></div>
                                                <h3 class = "mt-3">Cours de {{$data->nom_module}} ({{$data->designation_classe}})</h3>
                                                <div class = "row">
                                                    <div class = "col-6">
                                                        <p class = "mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Enseignant :</p>
                                                        <div class = "d-flex">
                                                            <img src = "{{URL::asset($data->path_photo_profile)}}" alt = "Photo de profil" class = "rounded-circle me-2" height = "24">
                                                            <div>
                                                                <h5 class = "mt-1 font-14">
                                                                    {{$data->prenom}} {{$data->nom}}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "col-6">
                                                        <p class = "mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Date de création :</p>
                                                        <div class = "d-flex">
                                                            <i class = 'uil uil-schedule font-18 text-success me-1'></i>
                                                            <div>
                                                                <h5 class = "mt-1 font-14 text-capitalize">
                                                                    <?php
                                                                        setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                        echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($data->date_creation_cours))))
                                                                    ?>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-6">
                                                        <p class = "mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Semestre :</p>
                                                        <div class = "d-flex">
                                                            <i class = 'uil uil-graduation-hat font-18 text-success me-1'></i>
                                                            <div>
                                                                <h5 class = "mt-1 font-14">
                                                                    {{$data->semestre}}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "col-6">
                                                        <p class = "mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Année universitaire :</p>
                                                        <div class = "d-flex">
                                                            <i class = 'uil uil-calender font-18 text-success me-1'></i>
                                                            <div>
                                                                <h5 class = "mt-1 font-14">
                                                                    {{$data->debut_annee_universitaire}} - {{$data->fin_annee_universitaire}}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class = "text-center mx-auto mt-5 py-5">Vous n'avez pas de cours pour cette année universitaire jusqu'à présent.</p>
                            @endif
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