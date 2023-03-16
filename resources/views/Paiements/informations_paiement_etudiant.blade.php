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
                        <div class = "row justify-content-center">
                            <div class = "col-xxl-10">
                                <div class = "text-center">
                                    <h3 class = "mb-2">Informations de paiement</h3>
                                    <p class = "text-muted w-50 m-auto">
                                        Les détails de paiement sont disponibles à tout moment. Vous pouvez les changer en revenir à l'interface précédente.
                                    </p>
                                </div>
                                <div class = "row mt-sm-5 mt-3 mb-3">
                                    @if($informations_paiements != null)
                                        @if($informations_paiements->getTypePaiementAttribute() == "Tranche")
                                            @if($informations_paiements->getMontantTranche1Attribute() != 0.000)
                                                <div class = "col-md-4">
                                                    <div class = "card card-pricing card-paied">
                                                        <div class = "card-body text-center">
                                                            <div class = "card-paied-plan-tag">Payé</div>
                                                            <p class = "card-pricing-plan-name fw-bold text-uppercase">Tranche 1</p>
                                                            <i class = "card-pricing-icon uil uil-dollar-alt text-primary"></i>
                                                            <h2 class = "card-pricing-price">{{number_format($informations_paiements->getMontantTranche1Attribute(), 3)}} <span>DT</span></h2>
                                                            <ul class = "card-pricing-features">
                                                                <li>Méthode : {{$informations_paiements->getMethodePaiement1Attribute()}}</li>
                                                                <li>Payé le : <span class = "text-capitalize"><?php  setlocale (LC_TIME, 'fr_FR.utf8','fra');  echo utf8_encode($informations_paiements->getFormattedDatePaiementTranche1Attribute());?></span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($informations_paiements->getMontantTranche1Attribute() == 0.000)
                                                <div class = "col-md-4">
                                                    <div class = "card card-pricing card-impaied">
                                                        <div class = "card-body text-center">
                                                            <div class = "card-impaied-plan-tag">Impayé</div>
                                                            <p class = "card-pricing-plan-name fw-bold text-uppercase">Tranche 1</p>
                                                            <i class = "card-pricing-icon uil uil-dollar-alt text-primary"></i>
                                                            <h2 class = "card-pricing-price">0.000<span>DT</span></h2>
                                                            <ul class = "card-pricing-features">
                                                                <li>Méthode : Indéfini</li>
                                                                <li>Payé le : Indéfini</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($informations_paiements->getMontantTranche2Attribute() != 0.000)
                                                <div class = "col-md-4">
                                                    <div class = "card card-pricing card-paied">
                                                        <div class = "card-body text-center">
                                                            <div class = "card-paied-plan-tag">Payé</div>
                                                            <p class = "card-pricing-plan-name fw-bold text-uppercase">Tranche 2</p>
                                                            <i class = "card-pricing-icon uil uil-dollar-alt text-primary"></i>
                                                            <h2 class = "card-pricing-price">{{number_format($informations_paiements->getMontantTranche2Attribute(), 3)}} <span>DT</span></h2>
                                                            <ul class = "card-pricing-features">
                                                                <li>Méthode : {{$informations_paiements->getMethodePaiement2Attribute()}}</li>
                                                                <li>Payé le : <span class = "text-capitalize"><?php  setlocale (LC_TIME, 'fr_FR.utf8','fra');  echo utf8_encode($informations_paiements->getFormattedDatePaiementTranche2Attribute());?></span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($informations_paiements->getMontantTranche2Attribute() == 0.000)
                                                <div class = "col-md-4">
                                                    <div class = "card card-pricing card-impaied">
                                                        <div class = "card-body text-center">
                                                            <div class = "card-impaied-plan-tag">Impayé</div>
                                                            <p class = "card-pricing-plan-name fw-bold text-uppercase">Tranche 2</p>
                                                            <i class = "card-pricing-icon uil uil-dollar-alt text-primary"></i>
                                                            <h2 class = "card-pricing-price">0.000 <span>DT</span></h2>
                                                            <ul class = "card-pricing-features">
                                                                <li>Méthode : Indéfini</li>
                                                                <li>Payé le : Indéfini</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($informations_paiements->getMontantTranche3Attribute() != 0.000)
                                                <div class = "col-md-4">
                                                    <div class = "card card-pricing card-paied">
                                                        <div class = "card-body text-center">
                                                            <div class = "card-paied-plan-tag">Payé</div>
                                                            <p class = "card-pricing-plan-name fw-bold text-uppercase">Tranche 3</p>
                                                            <i class = "card-pricing-icon uil uil-dollar-alt text-primary"></i>
                                                            <h2 class = "card-pricing-price">{{number_format($informations_paiements->getMontantTranche3Attribute(), 3)}} <span>DT</span></h2>
                                                            <ul class = "card-pricing-features">
                                                                <li>Méthode : {{$informations_paiements->getMethodePaiement3Attribute()}}</li>
                                                                <li>Payé le : <span class = "text-capitalize"><?php  setlocale (LC_TIME, 'fr_FR.utf8','fra');  echo utf8_encode($informations_paiements->getFormattedDatePaiementTranche3Attribute());?></span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($informations_paiements->getMontantTranche3Attribute() == 0.000)
                                                <div class = "col-md-4">
                                                    <div class = "card card-pricing card-impaied">
                                                        <div class = "card-body text-center">
                                                            <div class = "card-impaied-plan-tag">Impayé</div>
                                                            <p class = "card-pricing-plan-name fw-bold text-uppercase">Tranche 3</p>
                                                            <i class = "card-pricing-icon uil uil-dollar-alt text-primary"></i>
                                                            <h2 class = "card-pricing-price">0.000 <span>DT</span></h2>
                                                            <ul class = "card-pricing-features">
                                                                <li>Méthode : Indéfini</li>
                                                                <li>Payé le : Indéfini</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif($informations_paiements->getTypePaiementAttribute() == "Totale")
                                            <div class = "col-md-4">

                                            </div>
                                            <div class = "col-md-4">
                                                <div class = "card card-pricing card-paied">
                                                    <div class = "card-body text-center">
                                                        <div class = "card-paied-plan-tag">Payé</div>
                                                        <p class = "card-pricing-plan-name fw-bold text-uppercase">Totale</p>
                                                        <i class = "card-pricing-icon uil uil-dollar-alt text-primary"></i>
                                                        <h2 class = "card-pricing-price">{{number_format($informations_paiements->getMontantTotaleAttribute(), 3)}} <span>DT</span></h2>
                                                        <ul class = "card-pricing-features">
                                                            <li>Méthode : {{$informations_paiements->getMethodePaiementTotaleAttribute()}}</li>
                                                            <li>Payé le : <span class = "text-capitalize"><?php  setlocale (LC_TIME, 'fr_FR.utf8','fra');  echo utf8_encode($informations_paiements->getFormattedDatePaiementTotaleAttribute());?></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "col-md-4">

                                            </div>
                                        @endif
                                    @else
                                        <div class = "row justify-content-center">
                                            <div class = "col-lg-4">
                                                <div class = "text-center">
                                                    <img src = "{{asset('/images/not_found.png')}}" height = "200" alt = "Image introuvable">
                                                    <h2 class = "text-error mt-0">404</h2>
                                                    <h4 class = "text-uppercase text-danger mt-3">Page Introuvable</h4>
                                                    <p class = "text-muted mt-2">
                                                        Malheureusement, nous n'avons pas trouvé les informations de paiement avec cette identifiant. parce que le paiement n'est pas effectué par l'étudiant.
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
            <footer class = "footer">
                @include("Layouts.footer_site")
            </footer>
            @include("Layouts.right_navbar_site")
        </div>
        <div class = "rightbar-overlay"></div>
        @include("Layouts.script_site")
    </body>
</html>