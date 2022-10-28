<?php 
$title = "Page - Contact";
require("head.php"); 
?>
<div class="card-NewFilm mx-auto" id="contactForm">
        <h3>Contact</h3>
                <form method="post" action="" class="text-center" name="formContact">
                        <hr class="hrstyle1">
                        <div class="form-group w-50 mx-auto">
                        <input class="form-style" placeholder="Mail" autocomplete="off" type="text" id="inputMail" name="contactEmail" required="required"
                        value="<?php if (isset($_POST["contactEmail"])) echo htmlspecialchars($_POST["contactEmail"]);?>">
                        <i id="iconMail" class="input-icon fa-solid fa-envelope"></i>
                        </div>
                        <div class="form-group w-50 mx-auto">
                        <input class="form-style" placeholder="Telephone" autocomplete="off" type="text" id="inputPhone" name="contactPhone" required="required"
                        value="<?php if (isset($_POST["contactPhone"])) echo htmlspecialchars($_POST["contactPhone"]);?>">
                        <i id="iconPhone" class="input-icon fa-solid fa-phone"></i>
                        </div>
                        <div class="form-group w-50 mx-auto">
                        <input class="form-style" placeholder="Objet" autocomplete="off" type="text" id="inputObj" name="contactObj" required="required"
                        value="<?php if (isset($_POST["contactObj"])) echo htmlspecialchars($_POST["contactObj"]);?>">
                        <i id="iconObj" class="input-icon fas fa-comments"></i>
                        </div>
                        <div class="form-group w-50 mx-auto">
                        <label class="label-contact">Contenu : </label>
                        </div>
                        </br>
                        <div class="form-group w-50 mx-auto">
                        <textarea class="form-style" placeholder="255 caractères max" autocomplete="off" type="placeholder" id="inputContent" name="contactContent" required="required"
                        value="<?php if (isset($_POST["contactContent"])) echo htmlspecialchars($_POST["contactContent"]);?>"></textarea>
                        </br>
                        <div class="text-center mx-auto">
                                <input type="submit" class="bn632-hover bn26" value="Envoyer" name="nouveauMail">
                        </div>
                        </br>
                </form>
</div>
<?php 
require("footer.php");?>