<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Paiement | Université Sesame</title>
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
                                            <li class = "breadcrumb-item active">Paiement</li>
                                        </ol>    
                                    </div>
                                    <h4 class = "page-title text-blue">Paiement</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <ul class = "nav nav-pills bg-nav-pills nav-justified mb-3">
                                            <li class = "nav-item">
                                                <a href = "#billing-information" data-bs-toggle = "tab" aria-expanded = "false" class = "nav-link rounded-0 active">
                                                    <i class = "mdi mdi-credit-card-search font-18"></i>
                                                    <span class = "d-none d-lg-block">Paiement</span>
                                                </a>
                                            </li>
                                            <li class = "nav-item">
                                                <a href = "#payment-information" data-bs-toggle = "tab" aria-expanded = "false" class = "nav-link rounded-0">
                                                    <i class = "mdi mdi-credit-card-plus font-18"></i>
                                                    <span class = "d-none d-lg-block">Tranche</span>
                                                </a>
                                            </li>
                                        </ul>
                                        @if($etudiant != null)
                                            <div class = "tab-content">
                                                <div class = "tab-pane show active" id = "billing-information">
                                                    @if(!empty($liste_paiements)  && ($liste_paiements->count()))
                                                        <table class = "table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <td>Étudiant</td>
                                                                    <td>Année Universitaire</td>
                                                                    <td>Type De Paiement</td>
                                                                    <td>Etat De Paiement</td>
                                                                    <td>Actions</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($liste_paiements as $data)
                                                                    <tr>
                                                                        <td class = "table-user">
                                                                            <img src = "{{URL::asset($data->path_photo_profile)}}" alt = "Photo de profil" class = "me-2 rounded-circle" width = 38 height = 38/>
                                                                             {{$data->prenom}} {{$data->nom}}
                                                                        </td>
                                                                        <td>
                                                                            Année universitaire {{$data->debut_annee_universitaire}} - {{$data->fin_annee_universitaire}}
                                                                        </td>
                                                                        <td>
                                                                            @if($data->getTypePaiementAttribute() == "Totale")
                                                                                Totale
                                                                            @else
                                                                                Tranche
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if($data->getTypePaiementAttribute() == "Totale")
                                                                                <span class = "badge bg-success p-2">Payé</span>
                                                                            @else
                                                                                @if($data->getMethodePaiement1Attribute() != null && $data->getMethodePaiement2Attribute() != null && $data->getMethodePaiement3Attribute())
                                                                                    <span class = "badge bg-success p-2">Payé</span>
                                                                                @else
                                                                                    <span class = "badge bg-danger p-2">Impayé</span>
                                                                                @endif
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <a href = "{{url('/informations-paiement-etudiant?id_paiement='.$data->getIdPaiementEtudiantAttribute())}}" class = "btn btn-primary">Informations</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p class = "text-center text-black">Aucune information n'est disponible concernant les paiements pour le moment.</p>
                                                    @endif
                                                </div>
                                                <div class = "tab-pane" id = "payment-information">
                                                    <div class = "row">
                                                        <div class = "col-lg-12">
                                                            <h4 class = "mt-2">Payer une tranche</h4>
                                                            <p class = "text-muted mb-4">
                                                                Le paiement des frais de scolarité pour les étudiants se fait ici.
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
                                                            <form name = "f-form-ajouter-paiement" id  = "f-form-ajouter-paiement" method = "post" action = "{{url('/creer-paiement')}}" onsubmit = "validerFormulaireAjouterPaiement()">
                                                                {{ csrf_field() }}
                                                                <div class = "row">
                                                                    <div class = "col-6">
                                                                        <div class = "mb-3">
                                                                            <label class = "form-label">Type</label>
                                                                            <select class = "form-select" id = "type" name = "type" required>
                                                                                <option value = "#" selected disabled>Sélectionnez le type de paiement..</option>
                                                                                @if(count($liste_types_paiements) == 0)
                                                                                    <option value = "#" selected disabled>La liste des méthodes est vide.</option>
                                                                                @else
                                                                                    @foreach($liste_types_paiements as $data)
                                                                                        <option value = "{{$data->getTypeAttribute()}}">{{$data->getTypeAttribute()}}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class = "col-6">
                                                                        <div class = "mb-3">
                                                                            <label class = "form-label">Année Universitaire</label>
                                                                            <select class = "form-select" name = "annee_universitaire" id = "annee_universitaire">
                                                                                <option value = "#">Sélectionnez l'année universitaire..</option>
                                                                                @if(count($liste_annees_universitaires) == 0)
                                                                                    <option value = "#" selected disabled>La liste des année universitaire est vide.</option>
                                                                                @else
                                                                                    @foreach($liste_annees_universitaires as $data)
                                                                                        <option value = "{{$data->getIdAnneeUniversitaireAttribute()}}">Année universitaire {{$data->getDebutAnneeUniversitaireAttribute()}} - {{$data->getFinAnneeUniversitaireAttribute()}}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class = "row">
                                                                    @if(count($liste_methodes_paiement) > 0)
                                                                        @foreach($liste_methodes_paiement as $data)
                                                                            <div class = "col-4">
                                                                                <div class = "border p-3 mb-3 rounded">
                                                                                    @if($data->getMethodeAttribute() == "Chèque")
                                                                                        <div class = "row">
                                                                                            <div class = "col-sm-9">
                                                                                                <div class = "form-check">
                                                                                                    <input type = "radio" id = "methode" name = "methode" class = "form-check-input" value = "{{$data->getMethodeAttribute()}}" required>
                                                                                                    <label class = "form-check-label font-16 fw-bold" for = "methode">{{$data->getMethodeAttribute()}}</label>
                                                                                                </div>
                                                                                                <p class = "mb-0 ps-3 pt-1">Payé les frais de scolarité avec un chèque.</p>
                                                                                            </div>
                                                                                            <div class = "col-sm-3 text-sm-end mt-0 mt-sm-0">
                                                                                                <img src = "{{asset('/images/cheque.png')}}" height = "26" alt = "Chéque bancaire">
                                                                                            </div>
                                                                                        </div>
                                                                                    @elseif($data->getMethodeAttribute() == "Espèces")
                                                                                        <div class = "row">
                                                                                            <div class = "col-sm-9">
                                                                                                <div class = "form-check">
                                                                                                    <input type = "radio" id = "methode" name = "methode" class = "form-check-input" value = "{{$data->getMethodeAttribute()}}" required>
                                                                                                    <label class = "form-check-label font-16 fw-bold" for = "methode">{{$data->getMethodeAttribute()}}</label>
                                                                                                </div>
                                                                                                <p class = "mb-0 ps-3 pt-1">Payé les frais de scolarité en espéces.</p>
                                                                                            </div>
                                                                                            <div class = "col-sm-3 text-sm-end mt-5 mt-sm-0">
                                                                                                <img src = "{{asset('/images/cod.png')}}" height = "16" alt = "Espéces">
                                                                                            </div>
                                                                                        </div>
                                                                                    @elseif($data->getMethodeAttribute() == "Virement bancaire")
                                                                                        <div class = "row">
                                                                                            <div class = "col-sm-9">
                                                                                                <div class = "form-check">
                                                                                                    <input type = "radio" id = "methode" name = "methode" class = "form-check-input" value = "{{$data->getMethodeAttribute()}}" required>
                                                                                                    <label class = "form-check-label font-16 fw-bold" for = "methode">{{$data->getMethodeAttribute()}}</label>
                                                                                                </div>
                                                                                                <p class = "mb-0 ps-3 pt-1">Payé les frais de scolarité avec un virement.</p>
                                                                                            </div>
                                                                                            <div class = "col-sm-3 text-sm-end mt-5 mt-sm-0">
                                                                                                <img src = "{{asset('/images/visa.png')}}" height = "16" alt = "Virement bancaire">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                                <div class = "row">
                                                                    <div class = "col-md-12">
                                                                        <div class = "mb-3">
                                                                            <label for = "montant" class = "form-label">Montant</label>
                                                                            <input type = "text" class = "form-control" id = "montant" name = "montant" placeholder = "Saisissez le montant.." onkeypress = "return (event.charCode>=46 && event.charCode<=57)" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type = "hidden" name = "id_user" id = "id_user" value = "{{$_GET['id_user']}}" required>
                                                                <div class = "row mt-4">
                                                                    <div class = "col-sm-6">
                                                                        <a href = "{{url('/liste-etudiants')}}" class = "btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                                        <i class="mdi mdi-arrow-left"></i> Retour aux liste des étudiants</a>
                                                                    </div> 
                                                                    <div class = "col-sm-6">
                                                                        <div class = "text-sm-end">
                                                                            <button type = "submit" class = "btn btn-primary">
                                                                                <i class = "mdi mdi-cash-multiple me-1"></i> 
                                                                                Payer
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
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
                                                            Malheureusement, nous n'avons pas trouvé un étudiant avec cette identifiant. Veuillez vérifier l'identifiant et réessayer plus tard.
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