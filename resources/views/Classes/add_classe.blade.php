<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Nouvelle Classe | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Nouvelle Classe</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Nouvelle Classe</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Nouvelle Classe</h4>
                                        <p class = "text-muted font-14">
                                            Créez une nouvelle classe en ajoutant les informations réquises de la classe tels que la liste des étudiants, l'année universitaire et la désignation de la classe.
                                        </p>
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
                                        <form name = "f-form-ajouter-classe" id  = "f-form-ajouter-classe" method = "post" action = "{{url('/creer-classe')}}" onsubmit = "validerFormulaireCreerClasse()">
                                            {{ csrf_field() }}
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "etudiants" class = "form-label">Liste Des Étudiants</label>
                                                        <select class = "select2 form-control select2-multiple" data-toggle = "select2" multiple data-placeholder = "Sélectionnez les étudiants.." name = "etudiants[]" id = "etudiants">
                                                            <optgroup label = "Étudiants">
                                                                @if(count($liste_etudiants) == 0)
                                                                    <option value = "#" selected disabled>La liste des étudiants est vide.</option>
                                                                @else
                                                                    @foreach($liste_etudiants as $data)
                                                                        <option value = "{{$data->getIdUserAttribute()}}">{{$data->getFullNameUserAttribute()}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "annee_universitaire" class = "form-label">Année Universitaire</label>
                                                        <select class = "form-select" name = "annee_universitaire" id = "annee_universitaire">
                                                            <option value = "#">Sélectionnez l'année universitaire..</option>
                                                            @if(count($liste_annees_universitaire) == 0)
                                                                <option value = "#" selected disabled>La liste des année universitaire est vide.</option>
                                                            @else
                                                                @foreach($liste_annees_universitaire as $data)
                                                                    <option value = "{{$data->getIdAnneeUniversitaireAttribute()}}">Année universitaire {{$data->getDebutAnneeUniversitaireAttribute()}} - {{$data->getFinAnneeUniversitaireAttribute()}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-12">
                                                    <div class = "mb-3">
                                                        <label for = "designation" class = "form-label">Désignation</label>
                                                        <input type = "text" class = "form-control" id = "designation" name = "designation" placeholder = "Saisissez la désignation de la classe.." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "text-end">
                                                <button type = "submit" class = "btn btn-primary">
                                                    <i class = "mdi mdi-plus"></i> 
                                                    Créer
                                                </button>
                                            </div>
                                        </form>
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