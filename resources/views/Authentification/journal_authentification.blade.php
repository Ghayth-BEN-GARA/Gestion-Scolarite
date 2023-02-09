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
                                            Le journal d'authentification est un espace qui vous permet de voir les actions d'authentification créées par votre compte. Si vous le souhaitez, vous pouvez effacer votre journal d'authentification en cliquant sur <b class = "text-decoration-underline cursor" onclick = "questionSupprimerJournal()">Vider le journal</b>.
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
                                        @elseif(Session()->has("succes"))
                                            <div class = "alert alert-success d-flex alert-dismissible fade show mt-1" role = "alert">
                                                <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" fill = "currentColor" class = "bi flex-shrink-0 me-2" viewBox = "0 0 16 16" role = "img" aria-label = "Warning:">
                                                    <path d = "M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </svg>
                                                <span class = "d-flex justify-content-start">
                                                    {{session()->get('succes')}}
                                                </span>
                                                <button type = "button" class = "btn-close" data-bs-dismiss = "alert" aria-label = "Close"></button>
                                            </div>
                                        @endif
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
                                                            @if(!empty($journal) && ($journal->count()))
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
                                                            @else
                                                                <tr>
                                                                    <td colspan = "4" class = "text-center">Aucune action sur votre compte actuellement trouvée.</td>
                                                                </tr>
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
        @include("Layouts.right_navbar_site")
        <div class = "rightbar-overlay"></div>
        @include("Layouts.script_site")
    </body>
</html>