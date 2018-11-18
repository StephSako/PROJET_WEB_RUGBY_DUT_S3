<script>
function redirectViderBDConso() {

    var r = confirm("Voulez-vous vraiment réinitialiser les consommations ?");
    if (r == true) {
        window.location.href = "../controleurs/viderBDConso.php";
    } else if(r == false){
        window.location.href = "../vues/viderBD.php";
    }
}

function redirectViderBDComptes() {

    var r = confirm("Voulez-vous vraiment réinitialiser les comptes ?");
    if (r == true) {
        window.location.href = "../controleurs/viderBDComptes.php";
    } else if(r == false){
        window.location.href = "../vues/viderBD.php";
    }
}
</script>