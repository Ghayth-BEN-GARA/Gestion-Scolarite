<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Classe | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Classe</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Classe</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Classe</h4>
                                        @if(Session()->has("erreur"))
                                            <div class = "alert alert-danger d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    {{session()->get('erreur')}}
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @elseif(Session()->has("success"))
                                            <div class = "alert alert-success d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    {{session()->get('success')}}
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @endif
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
                                                            <a href = "{{url('/liste-classes')}}" class = "btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                            <i class = "mdi mdi-arrow-left"></i> Retour aux classes </a>
                                                        </div>
                                                        <div class = "col-sm-6">
                                                            <div class = "text-sm-end">
                                                                <a href = "{{url('/add-classe')}}" class = "btn btn-primary">
                                                                    <i class = "mdi mdi-plus me-1"></i>
                                                                     Ajouter une classe 
                                                                </a>
                                                            </div>
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
            <footer class = "footer">
                @include("Layouts.footer_site")
            </footer>
            @include("Layouts.right_navbar_site")
        </div>
        <div class = "rightbar-overlay"></div>
        @include("Layouts.script_site")
    </body>
</html>