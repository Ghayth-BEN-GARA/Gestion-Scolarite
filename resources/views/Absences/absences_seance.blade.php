<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Appel | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Appel</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Appel</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            @if($seance != null)
                                <div class = "col-xxl-8 col-lg-4">
                                    <div class = "card d-block">
                                        <div class = "card-body">
                                            <h3 class = "mt-0">
                                                Séance {{$seance->nom_module}} ({{$seance->designation_classe}})
                                            </h3>
                                            @if($seance->date_seance < date('Y-m-d'))
                                                <div class = "badge bg-danger text-light mb-3 p-2">Terminée</div>
                                            @elseif($seance->date_seance == date('Y-m-d'))
                                                <div class = "badge bg-success text-light mb-3 p-2">Aujourd'hui</div>
                                            @elseif($seance->date_seance > date('Y-m-d'))
                                                <div class = "badge bg-secondary text-light mb-3 p-2">À venir</div>
                                            @endif
                                            <p class = "text-muted mb-4">
                                                Une séance du cours de <b>{{$seance->nom_module}}</b> enseignée par le professeur <b>{{$seance->prenom}} {{$seance->nom}}</b> en salle <b>numéro {{$seance->id_salle}}</b> construite dans l'étage numéro <b>{{$seance->numero_etage}}</b> le <b><?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($seance->date_seance)))); ?></b> de <b>{{date('H:i', strtotime($seance->heure_debut_seance))}} à {{date('H:i', strtotime($seance->heure_fin_seance))}}</b> pour la classe <b>{{$seance->designation_classe}}</b> dont l'année universitaire est <b>{{$seance->debut_annee_universitaire}} - {{$seance->fin_annee_universitaire}}</b>.
                                            </p>
                                            <div class = "row">
                                                <div class = "col-md-5">
                                                    <div class = "mb-4">
                                                        <h5>Date de la séance</h5>
                                                        <small class = "text-capitalize"><?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($seance->date_seance)))); ?></small>
                                                    </div>
                                                </div>
                                                <div class = "col-md-3">
                                                    <div class = "mb-4">
                                                        <h5>Début</h5>
                                                        <small>{{date('H:i', strtotime($seance->heure_debut_seance))}}</small>
                                                    </div>
                                                </div>
                                                <div class = "col-md-3">
                                                    <div class = "mb-4">
                                                        <h5>Fin</h5>
                                                        <small>{{date('H:i', strtotime($seance->heure_fin_seance))}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id = "tooltip-container">
                                                <h5 class = "mt-2">Enseignant:</h5>
                                                <a href = "javascript:void(0);" data-bs-container = "#tooltip-container" data-bs-toggle = "tooltip" data-bs-placement = "top" title = "{{$seance->prenom}} {{$seance->prenom}}" class = "d-inline-block">
                                                    <img src = "{{URL::asset($seance->path_photo_profile)}}" class = "rounded-circle img-thumbnail avatar-sm" alt = "Photo de profil">
                                                </a>
                                                <span class = "mx-1">{{$seance->prenom}} {{$seance->nom}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-xxl-8 col-lg-4">
                                    <div class = "card">
                                        <div class = "card-body">
                                            <div class = "pe-xl-3">
                                                <h5 class = "mt-0 mb-3">Étudiants</h5>
                                                @livewire("liste-etudiants-appels-livewire", ["etudiants" => $seance->etudiant_classe, "seance" => $seance, "id_seance" => $seance->id_seance])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-xxl-8 col-lg-4">
                                    <div class = "card">
                                        <div class = "card-body">
                                            <div class = "pe-xl-3">
                                                <h5 class = "mt-0 mb-3">Absences</h5>
                                                @livewire("liste-absences-seance-livewire", ["etudiants" => $seance->etudiant_classe, "id_seance" => $seance->id_seance, "seance" => $seance])
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