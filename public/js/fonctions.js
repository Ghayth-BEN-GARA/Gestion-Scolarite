function questionDeconnexion(){
    swal({
        title: "Etes-vous sûr ?",
        text: "Déconnectez-vous de votre compte  !",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 45
    })

    .then((result) => {
        if (result.value) {
            chargement("Déconnexion en cours..").then(
                location.href = "/logout"
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

async function chargement(message) {
    swal({
        text: message,
        allowEscapeKey: false,
        allowOutsideClick: false,
        padding: "2em",
        width: "400px",
        onOpen: () => {
            swal.showLoading();
        }
    })
}

function questionSupprimerJournal() {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement le journal d'authentification  !",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 45
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-journal-authentification"
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function modifierConfigurationCompte() {
    var type_mode = null;

    if($("#dark-mode-check").is(":checked")){
        type_mode = "Dark";
    }

    else{
        type_mode = "Light";
    }

    modifierConfigurationCompteInstantannement(type_mode);
}

function modifierConfigurationCompteInstantannement(type_mode) {
    $.ajax({
        url: '/update-type-mode-configuration',
        type: "get",
        cache: true,
        data: { 
            mode: type_mode
        },
        success: function() {
            
        }
    })
}

function modifierStatusCompte() {
    var status = null;

    if($("#status_compte_active").is(":checked")){
        status = "Activé";
    }

    else{
        status = "Désactivé";
    }

    modifierStatusCompteInstantannement(status);
}

function modifierStatusCompteInstantannement(status) {
    $.ajax({
        url: '/update-status-compte',
        type: "get",
        cache: true,
        data: { 
            status: status
        },
        success: function() {
            
        }
    })
}

function questionSupprimerCompte() {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement votre compte  !",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 45
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-compte"
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function validerFormulaireCreerUtilisateur() {
    var genre = document.getElementById("genre").selectedIndex;
    var role = document.getElementById("role").selectedIndex;

    if(genre == 0){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner le genre de cet nouvel utilisateur.");
    }

    else if(role == 0){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner le rôle de cet nouvel utilisateur.");
    }

    else{
        $('#f-form-ajouter-user').submit();
    }
}

function afficherErreur(message) {
    swal({
        type: "error",
        title: "Oups !",
        html: message,
        width: 520,
        padding: '2em',
        showCancelButton: true,
        cancelButtonText: "Fermer",
        focusCancel: false,
        popup: 'animated fadeInDown faster',
        showConfirmButton: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        scrollbarPadding: true,
        allowOutsideClick: false
    })
}

function questionSupprimerUser(id_user) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement cet utilisateur !",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 45
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-user?id_user="+id_user
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function validerFormulaireCreerSalle() {
    var etage = document.getElementById("etage").selectedIndex;

    if(etage == 0){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner l'étage de cette nouvelle salle.");
    }

    else{
        $('#f-form-ajouter-salle').submit();
    }
}