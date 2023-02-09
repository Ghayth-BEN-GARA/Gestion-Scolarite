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