<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Emploi | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Emploi</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Emploi</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Emploi</h4>
                                        <p class = "text-muted font-14">
                                            Consultez les informations et l'emploi de cette classe qui est enregistré dans notre système.
                                        </p>
                                        @if($classe != null)
                                            <table class = "table table-bordered table-centered mb-0">
                                                <thead>
                                                    <tr class = "text-center">
                                                        <th>Identifiant</th>
                                                        <th>Désignation</th>
                                                        <th>Spécialité</th>
                                                        <th>Niveau</th>
                                                        <th>Année <br>Universitaire</th>
                                                        <th>Nombre <br>Des Étudiants</th>
                                                        <th>Nombre <br>Des Cours</th>
                                                        <th>Emplois</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class = "text-center">
                                                        <td>{{$classe->getIdClasseAttribute()}}</td>
                                                        <td>{{$classe->getDesignationClasseAttribute()}}</td>
                                                        <td>{{$classe->nom_specialite}}</td>
                                                        <td>{{$classe->getNiveauClasseAttribute()}}</td>
                                                        <td>{{$classe->debut_annee_universitaire}} - {{$classe->fin_annee_universitaire}}</td>
                                                        <td>{{count(explode(',', $classe->getEtudiantClasseAttribute()))}}</td>
                                                        <td>{{$nbr_cours}}</td>
                                                        <td>
                                                            @if($emploi_semestre1 == null && $emploi_semestre2 == null)
                                                                Pas disponible
                                                            @elseif($emploi_semestre1 != null && $emploi_semestre2 == null)
                                                                <a href = "{{$emploi_semestre1->getEmploiClasseAttribute()}}" target = "_blank">Semestre 1</a>
                                                            @elseif($emploi_semestre1 == null && $emploi_semestre2 != null)
                                                                <a href = "{{$emploi_semestre2->getEmploiClasseAttribute()}}" target = "_blank">Semestre 2</a>
                                                            @elseif($emploi_semestre1 != null && $emploi_semestre2 != null)
                                                                <a href = "{{$emploi_semestre1->getEmploiClasseAttribute()}}" target = "_blank">Semestre 1</a>
                                                                <a href = "{{$emploi_semestre2->getEmploiClasseAttribute()}}" target = "_blank">Semestre 2</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @else
                                            <div class = "row justify-content-center">
                                                <div class = "col-lg-4">
                                                    <div class = "text-center">
                                                        <img src = "{{asset('/images/not_found.png')}}" height = "200" alt = "Image introuvable">
                                                        <h2 class = "text-error mt-0">404</h2>
                                                        <h4 class = "text-uppercase text-danger mt-3">Page Introuvable</h4>
                                                        <p class = "text-muted mt-2">
                                                            Malheureusement, nous n'avons pas trouvé une classe avec cet identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
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