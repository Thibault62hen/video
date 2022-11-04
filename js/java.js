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
    //Admin connexion
    var admin1Exist = document.getElementById("Admin");    
    if(admin1Exist){document.getElementById("Admin").addEventListener("click", AfficherSousMenu);}
    var admin2Exist = document.getElementById("Admin2");    
    if(admin2Exist){document.getElementById("Admin2").addEventListener("click", AfficherSousMenu);}
    document.getElementById("logID").addEventListener("input", CIdentifiant);
    document.getElementById("logPASS").addEventListener("input", CPass);
    //Contact section
    if (window.location.toString().includes("Contact")){ 
    document.getElementById("inputMail").addEventListener("input", function(){testColor(this)});
    document.getElementById("inputPhone").addEventListener("input", function(){testColor(this)});
    document.getElementById("inputObj").addEventListener("input", function(){testColor(this)});
    document.getElementById("inputContent").addEventListener("input", function(){testColor(this)});}

    //back connexion button section
    document.getElementById("btnRetourCnx").addEventListener("click",function(){
    document.getElementById("sous-Admin").style.display = "none";
    if (window.location.toString().includes("Index")) {
    document.getElementById("carouselExampleControls").style.display = "block";
    }
    if (window.location.toString().includes("Contact")) {
        document.getElementById("contactForm").style.display = "block";
        }
    if (window.location.toString().includes("Catalogue")) {
        document.getElementById("catalogue").style.display = "block";
    }
    })
});
function testColor(idinput){
    if(idinput.getAttribute("id") == "inputMail"){
    var inputMail=new RegExp("^(?![0-9])+[a-zA-Z0-9.!#$%&'+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$");
    currentid = idinput.getAttribute("id");
        if (inputMail.test(idinput.value)) {
            document.getElementById("iconMail").style.color = "#3997d6";
        }
        else{
            document.getElementById("iconMail").style.color = "#FF0000";
        }
    }
    if(idinput.getAttribute("id") == "inputPhone"){
    var inputPhone=new RegExp("^[0-9]{10}$");
    currentid = idinput.getAttribute("id");
        if (inputPhone.test(idinput.value)) {
            document.getElementById("iconPhone").style.color = "#3997d6";
        }
        else{
            document.getElementById("iconPhone").style.color = "#FF0000";
        }
    }
    if(idinput.getAttribute("id") == "inputObj"){
    var inputObj =new RegExp("^[a-zA-Z]{3,20}$");
    currentid = idinput.getAttribute("id");
    if (inputObj.test(idinput.value)) {
        document.getElementById("iconObj").style.color = "#3997d6";
    }
    else{
        document.getElementById("iconObj").style.color = "#FF0000";
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
    if (window.location.toString().includes("Index")) {
        var sCarousel = document.getElementById("carouselExampleControls");
        sCarousel.style.setProperty("display", "none", "important");
    }
    if (window.location.toString().includes("Catalogue")) {
        var sCatalogue = document.getElementById("catalogue");
        sCatalogue.style.setProperty("display", "none", "important");
    }
    if (window.location.toString().includes("Contact")) {
        var sContact = document.getElementById("contactForm");
        sContact.style.setProperty("display", "none", "important");
    }
    if (sAdmin.style.display == "none") {
        sAdmin.style.setProperty("display", "flex", "important");
        if (window.location.toString().includes("Index")) {
            sCarousel.style.setProperty("display", "none", "important");
        }
        if (window.location.toString().includes("Contact")) {
            sContact.style.setProperty("display", "none", "important");
        }
        if (window.location.toString().includes("Catalogue")) {
            sContact.style.setProperty("display", "none", "important");
            }
        }
        else{
        sAdmin.style.setProperty("display", "none", "important");
            if (window.location.toString().includes("VCIAccueil")) {
            sCarousel.style.setProperty("display", "flex", "important");
            }
            if (window.location.toString().includes("Contact")){
                sContact.style.setProperty("display", "flex", "important");
            }
            if (window.location.href == "VCICatalogue.php") {
                sContact.style.setProperty("display", "none", "important");
        }
    }
}
//contact
