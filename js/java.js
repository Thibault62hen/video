window.addEventListener('load', function () {
    document.getElementById("Admin").addEventListener("click", AfficherSousMenu);
    document.getElementById("btnClear").addEventListener("click", ClearTxt);
});

function AfficherSousMenu() {
    if (document.getElementById("sous-Admin").style.visibility == "hidden") {
        document.getElementById("sous-Admin").style.visibility = "visible";
    } else {
        document.getElementById("sous-Admin").style.visibility = "hidden";
    }
}
function ClearTxt(){
  document.getElementById("idInsertion").value = "";
  document.getElementById("titreInsertion").value = "";
  document.getElementById("anneeInsertion").value = "";
  document.getElementById("imgInsertion").value = "";
  document.getElementById("resumeInsertion").value = "";
}
