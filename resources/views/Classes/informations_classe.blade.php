<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Informations De La Classe | Université Sesame</title>
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
                                                <li class = "breadcrumb-item active">Informations De La Classe</li>
                                            </ol>    
                                        </div>
                                        <h4 class = "page-title text-blue">Informations De La Classe</h4>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-12">
                                    <div class = "card">
                                        <div class = "card-body">
                                            <h4 class = "header-title">Informations De La Classe</h4>
                                            @if($classe != null)
                                                <div class = "row">
                                                    <div class = "col-lg-8">
                                                        @livewire('liste-etudiants-classe-livewire', ['etudiants' => $classe->getEtudiantClasseAttribute(), "id_classe" => $_GET['id_classe']])
                                                        <div class = "mt-3">
                                                            <label for = "example-textarea" class = "form-label">Description :</label>
                                                            <br>
                                                            <span class = "font-14">
                                                                La classe est nommée <b>{{$classe->getDesignationClasseAttribute()}}</b> pour l'année universitaire <b>{{$classe->debut_annee_universitaire}} - {{$classe->fin_annee_universitaire}}</b> a été créée le <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode($classe->getFormattedDateCreationClasseAttribute());?> dont le niveau est <b>{{$classe->getNiveauClasseAttribute()}}</b> et la spécialité est <b>{{$classe->nom_specialite}}</b>.
                                                            </span>
                                                        </div>
                                                        <div class = "row mt-4">
                                                            <div class = "col-sm-6">
                                                                <a href = "{{url('/liste-mes-cours-enseignants')}}" class = "btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                                <i class = "mdi mdi-arrow-left"></i> Retour aux cours </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "col-lg-4">
                                                        @livewire('liste-informations-classe-livewire', ['classe' => $classe])
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
                                                                Malheureusement, nous n'avons pas trouvé une classe avec cette identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
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