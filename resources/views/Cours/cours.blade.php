<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Cours | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Cours</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Cours</h4>
                                </div>
                            </div>
                        </div>
                        @if($cours != null)
                            <div class = "row">
                                <div class = "col-lg-8">
                                    <div class = "card">
                                        <div class = "card-body">
                                            <h4 class = "header-title mb-3">Cours de {{$cours->nom_module}}</h4>
                                            <div class = "table-responsive">
                                                <table class = "table mb-0">
                                                    <thead class = "table-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Début</th>
                                                            <th>Fin</th>
                                                            <th>Salle</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(!empty($liste_seances) && ($liste_seances->count()))
                                                            <?php $i = 0;?>
                                                            @foreach($liste_seances as $data)
                                                                <tr>
                                                                    <?php $i++;?>
                                                                    <th class = "row">{{$i}}</th>
                                                                    <td class = "text-capitalize">
                                                                        <?php 
                                                                        setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                        echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime($data->getDateSeanceAttribute())))); ?>
                                                                    </td>
                                                                    <td>{{date('H:i', strtotime($data->getHeureDebutSeanceAttribute()))}}</td>
                                                                    <td>{{date('H:i', strtotime($data->getHeureFinSeanceAttribute()))}}</td>
                                                                    <td>Salle N° {{$data->numero_salle}}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan = "4" class = "text-center">Aucune séance actuellement planifiée.</td>
                                                            </tr>
                                                        @endif
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
                                                            <td>{{$cours->nom_module}}</td>
                                                            <tr>
                                                                <td>Coefficient</td>
                                                                <td>{{$cours->coefficient_module}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nombre d'heures</td>
                                                                <td>{{$cours->nombre_heure_module}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Semestre</td>
                                                                <td>{{$cours->semestre}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Enseignant</td>
                                                                <td>{{$cours->prenom}} {{$cours->nom}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Spécialité</td>
                                                                <td>{{$cours->nom_specialite}}</td>
                                                            </tr>
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
                                            Malheureusement, nous n'avons pas trouvé un cours avec cette identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
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