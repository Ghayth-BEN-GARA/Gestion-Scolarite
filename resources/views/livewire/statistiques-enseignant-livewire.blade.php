<div>
    <div class = "row mb-2">
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Mes Classes</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getMesClassesAnneeUniversitaireActuel()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            @if(!is_null($this->getAnneeUniversitaireActuel()))
                                {{$this->getAnneeUniversitaireActuel()->debut_annee_universitaire}} -  {{$this->getAnneeUniversitaireActuel()->fin_annee_universitaire}}
                            @else
                                <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                            @endif
                        </span> 
                    </p>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Mes Cours</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getMesCoursAnneeUniversitaireActuel()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            @if(!is_null($this->getAnneeUniversitaireActuel()))
                                {{$this->getAnneeUniversitaireActuel()->debut_annee_universitaire}} -  {{$this->getAnneeUniversitaireActuel()->fin_annee_universitaire}}
                            @else
                                <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                            @endif
                        </span> 
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
