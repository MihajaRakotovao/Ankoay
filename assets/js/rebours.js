function reboursF() {
    let jour = document.getElementById("jour"),
        heure = document.getElementById("heure"),
        minute = document.getElementById("minute"),
        seconde = document.getElementById("seconde"),
        daty = document.getElementById("dateEve"),
        maintenant = new Date(),
        finDate = new Date ((daty.textContent));
        let total_secondes = (finDate - maintenant) / 1000;
        if (total_secondes > 0) {
            let nb_jours = Math.floor(total_secondes / ( 60 * 60 * 24));
            let nb_heures = Math.floor((total_secondes - (nb_jours * 60 * 60 * 24)) / (60 * 60));
            let nb_minutes = Math.floor((total_secondes - ((nb_jours * 60 * 60 * 24 + nb_heures * 60 * 60))) / 60);
            let nb_secondes = Math.floor(total_secondes - ((nb_jours * 60 * 60 * 24 + nb_heures * 60 * 60 + nb_minutes * 60)));
            
            jour.textContent = caractere(nb_jours);
            heure.textContent = caractere(nb_heures);
            minute.textContent = caractere(nb_minutes);
            seconde.textContent = caractere(nb_secondes);
        }
        let minuteur = setTimeout("reboursF();", 1000);
    }
function caractere(nb) {
    return (nb < 10) ? '0' + nb : nb;
}
reboursF();