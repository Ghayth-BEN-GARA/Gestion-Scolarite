<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Nouvelle Séance | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Nouvelle Séance</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Nouvelle Séance</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Nouvelle Séance</h4>
                                        <p class = "text-muted font-14">
                                            Créez une nouvelle séance en ajoutant les informations réquises de cette séance.
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
                                        <form name = "f-form-ajouter-seance" id  = "f-form-ajouter-seance" method = "post" action = "{{url('/creer-seance')}}" onsubmit = "validerFormulaireCreerSeance()">
                                            {{ csrf_field() }}
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "cours" class = "form-label">Cours</label>
                                                        <select class = "form-select" name = "cours_seance" id = "cours_seance" required>
                                                            <option value = "#">Sélectionnez le cours..</option>
                                                            @if(count($liste_cours) == 0)
                                                                <option value = "#" selected disabled>La liste des cours est vide.</option>
                                                            @else
                                                                @foreach($liste_cours as $data)
                                                                    <option value = "{{$data->id_cours}}">{{$data->nom_module}} : {{$data->designation_classe}} | {{$data->semestre}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "salle" class = "form-label">Salle</label>
                                                        <select class = "form-select" name = "salle_seance" id = "salle_seance" required>
                                                            <option value = "#">Sélectionnez la salle..</option>
                                                            @if(count($liste_salles) == 0)
                                                                <option value = "#" selected disabled>La liste des salles est vide.</option>
                                                            @else
                                                                @foreach($liste_salles as $data)
                                                                    <option value = "{{$data->getIdSalleAttribute()}}">La salle numéro {{$data->getNumeroSalleAttribute()}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-12">
                                                    <div class = "mb-3">
                                                        <label for = "date_seance" class = "form-label">Date</label>
                                                        <input type = "date" class = "form-control" name = "date_seance" id = "date_seance" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "heure_debut_seance" class = "form-label">Heure Du Début</label>
                                                        <input type = "time" class = "form-control" name = "heure_debut_seance" id = "heure_debut_seance" required>
                                                    </div>
                                                </div>
                                                <div class = "col-md-6">
                                                    <div class = "mb-3">
                                                        <label for = "heure_fin_seance" class = "form-label">Heure De La Fin</label>
                                                        <input type = "time" class = "form-control" name = "heure_fin_seance" id = "heure_fin_seance" required>
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