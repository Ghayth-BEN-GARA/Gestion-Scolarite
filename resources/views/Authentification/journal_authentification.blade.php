<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Journal D'authentification | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Journal D'authentification</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Journal D'authentification</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Journal D'authentification</h4>
                                        <p class = "text-muted font-14">
                                            Le journal d'authentification est un espace qui vous permet de voir les actions d'authentification créées par votre compte. Si vous le souhaitez, vous pouvez effacer votre journal d'authentification en cliquant sur <b class = "text-decoration-underline">Vider le journal</b>.
                                        </p>
                                        <div class = "tab-content">
                                            <div class = "tab-pane show active" id = "responsive-preview">
                                                <div class = "table-responsive">
                                                    <table class = "table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope = "col">#</th>
                                                                <th scope = "col">Action</th>
                                                                <th scope = "col">Description</th>
                                                                <th scope = "col">Cadre Temporel</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($journal->count() == 0 && empty($journal))
                                                                <tr>
                                                                    <td colspan = "4" class = "text-center">Aucune action sur votre compte actuellement trouvée</td>
                                                                </tr>
                                                            @else
                                                                <?php $i = 1; ?>
                                                                @foreach($journal as $data)
                                                                    <tr>
                                                                        <th scope = "row">{{$i++}}</th>
                                                                        <td>{{$data->getTitreJournalAttribute()}}</td>
                                                                        <td>{{$data->getDescriptionJournalAttribute()}}</td>
                                                                        <td class = "text-capitalize">
                                                                            <?php 
                                                                                setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
                                                                                echo utf8_encode($data->getFormattedDateCreationJournalAttribute());
                                                                            ?>
                                                                            à 
                                                                            {{date('H:i',strtotime($data->getDateCreationJournalAttribute()))}}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class = "mt-3 mb-3">
                                                    {{$journal->links("vendor.pagination.pagination_normal")}}
                                                </div>
                                            </div>
                                        </div>
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
        <div class = "rightbar-overlay"></div>
        @include("Layouts.script_site")
    </body>
</html>