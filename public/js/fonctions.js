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
        text: "Supprimer définitivement votre journal d'authentification  !",
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
        afficherErreur("Vous devez sélectionner le genre de ce nouvel utilisateur.");
    }

    else if(role == 0){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner le rôle de ce nouvel utilisateur.");
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
        text: "Supprimer définitivement l'utilisateur choisi !",
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

function questionSupprimerSalle(id_salle) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement cette salle !",
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
                location.href = "/delete-salle?id_salle="+id_salle
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function questionSupprimerModule(id_module) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement ce module !",
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
                location.href = "/delete-module?id_module="+id_module
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function questionSupprimerSpecialite(id_specialite) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement cette spécialité !",
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
                location.href = "/delete-specialite?id_specialite="+id_specialite
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function questionSupprimerAnneeUniversitaire(id_annee_universitaire) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement cette année universitaire !",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 40
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-annee-universitaire?id_annee_universitaire="+id_annee_universitaire
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function validerFormulaireCreerClasse() {
    var liste_etudiants = document.getElementById("etudiants").value;
    var annee_universitaire = document.getElementById("annee_universitaire").value;
    var specialite = document.getElementById("specialite").selectedIndex;
    var niveau = document.getElementById("niveau").selectedIndex;

    if((liste_etudiants == "#") || (liste_etudiants == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner une liste des étudiants.");
    }

    else if((annee_universitaire == "#") || (annee_universitaire == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner l'année universitaire.");
    }

    else if(specialite == 0){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner la spécialité.");
    }

    else if(niveau == 0){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner le niveau.");
    }

    else{
        $("#f-form-ajouter-classe").submit();
    }
}

function questionSupprimerClasses(id_classe) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement cette classe !",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 40
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-classe?id_classe="+id_classe
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function questionSupprimerEtudiant(id_user, id_classe) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement l'étudiant de cette classe !",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 40
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-etudiant-classe?id_user="+id_user+"&id_classe="+id_classe
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function questionInviterEtudiants(id_classe) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Si vous confirmez l'action, des e-mails seront envoyés aux étudiants concernés de cette classe.",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 40
    })

    .then((result) => {
        if (result.value) {
            chargement("Envoi des emails en cours..").then(
                location.href = "/inviter-etudiant-classe?id_classe="+id_classe
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function validerFormulaireModifierClasse() {
    var liste_etudiants = document.getElementById("etudiants").value;
    var annee_universitaire = document.getElementById("annee_universitaire").value;
    var specialite = document.getElementById("specialite").selectedIndex;
    var niveau = document.getElementById("niveau").selectedIndex;

    if((liste_etudiants == "#") || (liste_etudiants == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner une liste des étudiants.");
    }

    else if((annee_universitaire == "#") || (annee_universitaire == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner l'année universitaire.");
    }

    else if(specialite == 0){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner la spécialité.");
    }

    else if(niveau == 0){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner le niveau.");
    }

    else{
        $("#f-form-modifier-classe").submit();
    }
}

function validerFormulaireModifierAnneeUniversitaireActuel() {
    var annee_universitaire = document.getElementById("annee_universitaire").value;

    if((annee_universitaire == "#") || (annee_universitaire == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner l'année universitaire.");
    }

    else{
        $("#f-form-modifier-annee-universitaire-actuel").submit();
    }
}

function validerFormulaireEnvoieEmploiDuTemps() {
    var semestre = document.getElementById("semestre").value;

    if((semestre == "#") || (semestre == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner la semestre.");
    }

    else{
        $("#f-form-envoyer-emploi-classe").submit();
    }
}

function validerFormulaireCreerCours() {
    var module = document.getElementById("module").value;
    var enseignant = document.getElementById("enseignant").value;
    var classe = document.getElementById("classe").value;
    var semestre = document.getElementById("semestre").value;

    if((module == "#") || (module == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner le module.");
    }

    else if((enseignant == "#") || (enseignant == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner l'enseignant.");
    }

    else if((classe == "#") || (classe == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner la classe.");
    }

    else if((semestre == "#") || (semestre == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner la semestre.");
    }

    else{
        $("#f-form-ajouter-cours").submit();
    }
}

function questionSupprimerCours(id_cours) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement le cours !",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 40
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-cours?id_cours="+id_cours
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function validerFormulaireCreerSeance() {
    var cours_seance = document.getElementById("cours_seance").value;
    var salle_seance = document.getElementById("salle_seance").value;
    var heure_debut = document.getElementById("heure_debut_seance").value;
    var heure_fin = document.getElementById("heure_fin_seance").value;

    if((cours_seance == "#") || (cours_seance == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner le cours.");
    }

    else if((salle_seance == "#") || (salle_seance == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner la salle.");
    }

    else if(heure_fin < heure_debut){
        event.preventDefault();
        afficherErreur("L'heure de début et l'heure de la fin ne sont pas valides.");
    }

    else{
        $("#f-form-ajouter-seance").submit();
    }
}

function questionSupprimerSeance(id_seance) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Supprimer définitivement la séance !",
        type: 'warning',
        showConfirmButton: true,
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#033D89',
        confirmButtonText: 'Oui, Je suis sûr !',
        cancelButtonText: 'Annuler',
        padding: 40
    })

    .then((result) => {
        if (result.value) {
            chargement("Suppression en cours..").then(
                location.href = "/delete-seance?id_seance="+id_seance
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}

function validerFormulaireAjouterPaiement() {
    var type = document.getElementById("type").value;
    var annee_universitaire = document.getElementById("annee_universitaire").value;

    if((type == "#") || (type == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner le type de paiement.");
    }

    else if((annee_universitaire == "#") || (annee_universitaire == "")){
        event.preventDefault();
        afficherErreur("Vous devez sélectionner l'année universitaire de paiement.");
    }

    else{
        $("#f-form-ajouter-paiement").submit();
    }
}

function selectAllCheckBox() {
    $('.etudiants').each(function() {
        if(this.checked == true) {
            this.checked = false; 
        }  
        
        else{
            this.checked = true; 
        }
    });
}

function UnselectAllCheckBox() {
    $('.etudiants').each(function() { 
        if($('#absence_collectif').is(':checked')){
            $('table#table input[type=checkbox]').attr('disabled','true');
        }

        else{
            $('table#table input[type=checkbox]').removeAttr('disabled');
        }
    });
}

function questionSupprimerAbsences(id_etudiant, id_seance) {
    swal({
        title: "Etes-vous sûr ?",
        text: "Marquer l'étudiant présent !",
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
            chargement("Suppression de l'absence en cours..").then(
                location.href = "/delete-absence-seance?id_seance="+id_seance+"&id_etudiant="+id_etudiant
            );
        }

        else if (result.dismiss === swal.DismissReason.cancel) {
            swal.close();
        }
    });
}