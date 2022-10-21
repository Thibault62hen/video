<?php 
$title = "Page - Contact";
require("head.php"); 
?>
<div class="card-NewFilm mx-auto">
        <h3>Contact</h3>
                <form method="post" action="../controleurs/VCIContact_controleur.php" class="text-center" name="formContact">
                        <hr class="hrstyle1">
                        <label class="label-contact">Email : </label>
                        <input class="input-contact" type="text" id="inputMail" name="contactEmail" required="required">
                        </br>
                        <label class="label-contact">Telephone : </label>
                        <input class="input-contact" type="text" id="inputPhone" name="contactPhone" required="required">
                        </br>
                        <label class="label-contact">Objet : </label>
                        <input class="input-contact" type="text" id="inputObj" name="contactObj" required="required">
                        </br>
                        <label class="label-contact">Contenu : </label>
                        </br>
                        <textarea class="input-contact" type="placeholder" id="inputContent" name="contactContent" required="required"></textarea>
                        </br>
                        <div class="text-center mx-auto">
                                <input type="submit" class="bn632-hover bn26" value="Envoyer" name="nouveauMail">
                        </div>
                        </br>
                </form>
</div>
<?php 
require("footer.php");?>