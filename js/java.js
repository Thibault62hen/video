var logID1 =new RegExp("^[a-zA-Z]{3,33}$");
var logPASS1 =new RegExp("^[a-zA-Z]{5,15}$");

window.addEventListener('load', function() {
    var date = new Date();
    var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "2-digit"
    };
    document.getElementById("date1").innerHTML = "Nous sommes le : " + date.toLocaleDateString("fr-FR", options);
    document.getElementById("Admin").addEventListener("click", AfficherSousMenu);
    document.getElementById("Admin2").addEventListener("click", AfficherSousMenu);
    document.getElementById("logID").addEventListener("input", CIdentifiant);
    document.getElementById("logPASS").addEventListener("input", CPass);
    document.getElementById("inputMail").addEventListener("input", function(){testColor(this)});
    document.getElementById("inputPhone").addEventListener("input", function(){testColor(this)});
    document.getElementById("inputObj").addEventListener("input", function(){testColor(this)});
    document.getElementById("inputContent").addEventListener("input", function(){testColor(this)});
    document.getElementById("btnRetourCnx").addEventListener("click",function(){
    document.getElementById("sous-Admin").style.display = "none";
    var sCatalogue = document.getElementsByClassName("gallery_product");
    if (window.location.toString().includes("Accueil")) {
    document.getElementById("carouselExampleControls").style.display = "block";
    }
    if (window.location.toString().includes("Catalogue")) {
        for(i = 0; i < sCatalogue.length; i++) {
            sCatalogue[i].style.display = "flex";
        }
    }
    })
});
function testColor(idinput){
    if(idinput.getAttribute("id") == "inputMail"){
    var inputMail=new RegExp("^(?![0-9])+[a-zA-Z0-9.!#$%&'+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$");
    currentid = idinput.getAttribute("id");
        if (inputMail.test(idinput.value)) {
            document.getElementById(currentid).style.boxShadow = "0px 0px 20px 4px rgb(0, 153, 255)";
        }
        else{
            document.getElementById(currentid).style.boxShadow = "0px 0px 20px 4px rgb(255, 0, 0)";
        }
    }
    if(idinput.getAttribute("id") == "inputPhone"){
    var inputPhone=new RegExp("^[0-9]{10}$");
    currentid = idinput.getAttribute("id");
        if (inputPhone.test(idinput.value)) {
            document.getElementById(currentid).style.boxShadow = "0px 0px 20px 4px rgb(0, 153, 255)";
        }
        else{
            document.getElementById(currentid).style.boxShadow = "0px 0px 20px 4px rgb(255, 0, 0)";
        }
    }
    if(idinput.getAttribute("id") == "inputObj"){
    var inputObj =new RegExp("^[a-zA-Z]{3,20}$");
    currentid = idinput.getAttribute("id");
    if (inputObj.test(idinput.value)) {
        document.getElementById(currentid).style.boxShadow = "0px 0px 20px 4px rgb(0, 153, 255)";
    }
    else{
        document.getElementById(currentid).style.boxShadow = "0px 0px 20px 4px rgb(255, 0, 0)";
    }
    }
    if(idinput.getAttribute("id") == "inputContent"){
    var inputContent =new RegExp("^[a-zA-Z]{10,200}$");
    currentid = idinput.getAttribute("id");
        if (inputContent.test(idinput.value)) {
            document.getElementById(currentid).style.boxShadow = "0px 0px 20px 4px rgb(0, 153, 255)";
        }
        else{
        document.getElementById(currentid).style.boxShadow = "0px 0px 20px 4px rgb(255, 0, 0)";
        }
    }
}
function CIdentifiant()
{
    var verifID = document.getElementById("logID").value;
    if (logID1.test(verifID)) {
        document.getElementById("iconID").style.color = "#3997d6";
    }
    else{
        document.getElementById("iconID").style.color = "#FF0000";
    }
}
function CPass()
{
    var verifPASS = document.getElementById("logPASS").value;
    if (logPASS1.test(verifPASS)) {
        document.getElementById("iconPASS").style.color = "#3997d6";
    }
    else{
        document.getElementById("iconPASS").style.color = "#FF0000";
    }
}
function AfficherSousMenu() {
    var sAdmin = document.getElementById("sous-Admin");
    sAdmin.style.setProperty("display", "none", "important");
    if (window.location.toString().includes("Accueil")) {
        var sCarousel = document.getElementById("carouselExampleControls");
        sCarousel.style.setProperty("display", "none", "important");
    }
    if (window.location.toString().includes("Catalogue")) {
        var sCatalogue = document.getElementsByClassName("gallery_product");
        for(i = 0; i < sCatalogue.length; i++) {
            sCatalogue[i].style.display = "none";
        }
    }
    if (sAdmin.style.display == "none") {
        sAdmin.style.setProperty("display", "flex", "important");
        if (window.location.toString().includes("Accueil")) {
            sCarousel.style.setProperty("display", "none", "important");
        }
        if (window.location.toString().includes("Catalogue")) {
            for(i = 0; i < sCatalogue.length; i++) {
                sCatalogue[i].style.display = "none";
                 }
            }
        }
        else{
        sAdmin.style.setProperty("display", "none", "important");
            if (window.location.href == "VCIAccueil.php") {
            sCarousel.style.setProperty("display", "block", "important");
            }
            if (window.location.href == "VCICatalogue.php") {
                for(i = 0; i < sCatalogue.length; i++) {
                    sCatalogue[i].style.display = "flex";
            }
        }
    }
}
//contact
