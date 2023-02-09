<div class = "end-bar">
    <div class = "rightbar-title">
        <a href = "javascript:void(0)" class = "end-bar-toggle float-end">
            <i class = "dripicons-cross noti-icon"></i>
        </a>
        <h5 class = "m-0">Paramètres</h5>
    </div>
    <div class = "rightbar-content h-100" data-simplebar = "">
        <div class = "p-3">
            <div class = "alert alert-warning" role = "alert">
                <strong>Personnaliser </strong> les paramètres de votre compte selon vos choix.
            </div>
            <h5 class = "mt-3">Mode</h5>
            <hr class = "mt-1">
            @if(App\Http\Controllers\ConfigurationCompteController::getConfigurationCompteUser()->getTypeModeConfigurationAttribute() == "Light")
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "color-scheme-mode" value = "dark" id = "dark-mode-check" onclick = "modifierConfigurationCompte()">
                    <label class = "form-check-label" for = "dark-mode-check">Sombre</label>
                </div>
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "color-scheme-mode" value = "light" id = "light-mode-check" onclick = "modifierConfigurationCompte()" checked>
                    <label class = "form-check-label" for = "light-mode-check">Normal</label>
                </div>
            @else
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "color-scheme-mode" value = "dark" id = "dark-mode-check" onclick = "modifierConfigurationCompte()" checked>
                    <label class = "form-check-label" for = "dark-mode-check">Sombre</label>
                </div>
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "color-scheme-mode" value = "light" id = "light-mode-check" onclick = "modifierConfigurationCompte()">
                    <label class = "form-check-label" for = "light-mode-check">Normal</label>
                </div>
            @endif
            <h5 class = "mt-3">Statut du compte</h5>
            <hr class = "mt-1">
            @if(App\Http\Controllers\CompteController::getCompteUser()->getStatusCompteAttribute() == "Activé")
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "stauts-compte" value = "active" id = "status_compte_active" checked>
                    <label class = "form-check-label" for = "active-status-compte">Activé</label>
                </div>
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "stauts-compte" value = "desactive" id = "status_compte_desactive">
                    <label class = "form-check-label" for = "desactive-status-compte">Désactivé</label>
                </div>
            @else
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "stauts-compte" value = "active" id = "status_compte_active">
                    <label class = "form-check-label" for = "active-status-compte">Activé</label>
                </div>
                <div class = "form-check form-switch mb-1">
                    <input class = "form-check-input" type = "radio" name = "stauts-compte" value = "desactive" id = "status_compte_desactive" checked>
                    <label class = "form-check-label" for = "desactive-status-compte">Désactivé</label>
                </div>
            @endif
            <h5 class = "mt-3">Suppression de compte</h5>
            <hr class = "mt-1">
            <p>
                Si vous avez choisi de supprimer votre compte, vos informations vos et données personnelles seront définitivement perdus.
            </p>
            <div class = "d-grid mt-4">
                <button class = "btn btn-primary" id = "deleteBtn">Supprimer votre compte</button>
            </div>
        </div>
    </div>
</div>