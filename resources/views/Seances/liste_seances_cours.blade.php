<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Séances | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Séances</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Séances</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            @if(!empty($liste_seances) && ($liste_seances->count()))
                                @foreach($liste_seances as $data)
                                    <div class = "col-xxl-8 col-lg-6">
                                        <div class = "card d-block">
                                            <div class = "card-body">
                                                <div class = "dropdown float-end">
                                                    <a href = "javascript:void(0)" class = "dropdown-toggle arrow-none card-drop" data-bs-toggle = "dropdown" aria-expanded = "false">
                                                        <i class = "dripicons-dots-3"></i>
                                                    </a>
                                                    <div class = "dropdown-menu dropdown-menu-end">
                                                        <a href = "javascript:void(0)" class = "dropdown-item">
                                                            <i class = 'uil uil-users-alt me-1'></i>Gérer les absences
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class = "mt-0">
                                                    Séance {{$data->nom_module}} ({{$data->designation_classe}})
                                                </h3>
                                                @if($data->date_seance < date('Y-m-d'))
                                                    <div class = "badge bg-danger text-light mb-3 p-2">Terminée</div>
                                                @elseif($data->date_seance == date('Y-m-d'))
                                                    <div class = "badge bg-success text-light mb-3 p-2">Aujourd'hui</div>
                                                @elseif($data->date_seance > date('Y-m-d'))
                                                    <div class = "badge bg-secondary text-light mb-3 p-2">À venir</div>
                                                @endif
                                                <p class = "text-muted mb-4">
                                                    Une séance du cours de <b>{{$data->nom_module}}</b> enseignée par le professeur <b>{{$data->prenom}} {{$data->nom}}</b> en salle <b>numéro {{$data->id_salle}}</b> construite dans l'étage numéro <b>{{$data->numero_etage}}</b> le <b><?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($data->date_seance)))); ?></b> de <b>{{date('H:i', strtotime($data->heure_debut_seance))}} à {{date('H:i', strtotime($data->heure_fin_seance))}}</b> pour la classe <b>{{$data->designation_classe}}</b> dont l'année universitaire est <b>{{$data->debut_annee_universitaire}} - {{$data->fin_annee_universitaire}}</b>.
                                                </p>
                                                <div class = "row">
                                                    <div class = "col-md-5">
                                                        <div class = "mb-4">
                                                            <h5>Date de la séance</h5>
                                                            <small class = "text-capitalize"><?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($data->date_seance)))); ?></small>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-3">
                                                        <div class = "mb-4">
                                                            <h5>Début</h5>
                                                            <small>{{date('H:i', strtotime($data->heure_debut_seance))}}</small>
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-3">
                                                        <div class = "mb-4">
                                                            <h5>Fin</h5>
                                                            <small>{{date('H:i', strtotime($data->heure_fin_seance))}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id = "tooltip-container">
                                                    <h5 class = "mt-2">Enseignant:</h5>
                                                    <a href = "javascript:void(0);" data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "top" title = "{{$data->prenom}} {{$data->prenom}}" class = "d-inline-block">
                                                        <img src = "{{URL::asset($data->path_photo_profile)}}" class = "rounded-circle img-thumbnail avatar-sm" alt = "Photo de profil">
                                                    </a>
                                                    <span class = "mx-1">{{$data->prenom}} {{$data->nom}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class = "text-center mx-auto mt-5 py-5">Vous n'avez pas de séances pour cette année universitaire jusqu'à présent.</p>
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
    </body>
    <div class = "rightbar-overlay"></div>
    @include("Layouts.script_site")
</html>