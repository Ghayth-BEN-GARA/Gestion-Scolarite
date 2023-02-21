<div>
    <div class = "row mb-2">
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Admin</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrAdmin()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Comptable</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrComptable()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Enseignant</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrEnseignant()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Etudiant</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrEtudiant()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Parent</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrParent()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Utilisateur</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrUser()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Étage</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrEtage()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Salle</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrSalle()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Module</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrModule()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Spécialité</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrSpecialite()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-xl-3">
            <div class = "card tilebox-one">
                <div class = "card-body">
                    <i class = 'uil uil-users-arrows float-end'></i>
                    <h6 class = "text-uppercase mt-0">Année Universitaire</h6>
                    <h2 class = "my-2" id = "active-users-count">{{$this->getNbrAnneeUniversitaire()}}</h2>
                    <p class = "mb-0 text-muted">
                        <span class = "text-nowrap text-capitalize">
                            <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo utf8_encode(strftime("%A %d %B %Y",strtotime(strftime(date('Y-m-d')))));?>
                        </span> 
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
