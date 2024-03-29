<?php
include "../header.php";
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta charset="utf-8">
    <title>Formulaire plongée</title>
  </head>
  <body>
  <form method="post" action="../backend/insererPlongee.php">
	    <fieldset style="width:850px; margin-left: auto; margin-right: auto; margin-top:5%">
  	        <legend>FORMULAIRE PLONGÉE</legend>
            <br/>

            <label> Date de la plongée : </label>
            <input type="date" class="date" id="datePlongee" name="dateplongee">


            <br/>
            <br/>

            <label> Séance de la plongée : </label> <br/>

            <p>
                <label>
                    <input name="seance" value="matin" type="radio"  />
                    <span>Matin</span>
                </label><br/>
            </p>
            <p>
                <label>
                    <input name="seance" value="apresmidi" type="radio"  />
                    <span>Après-midi</span>
                </label><br/>
            </p>
            <p>
                <label>
                    <input name="seance" value="soir" type="radio"  />
                    <span>Soir</span>
                </label>
            </p>
            <br/>
            <br/>

            <label>Nom du site : </label>
            <select id="numSite" class="browser-default" name="numSite">
                <option value = "">Sélectionnez le nom du site</option>
                <?php 
                require_once "../backend/bddPlongee.php";
                $bdd = new bddPlongee();

                $req = "select * from PLO_SITE order by SIT_NOM";

                $rep = $bdd->exec($req);

                for($i = 0; $i<sizeof($rep); $i++){
                    $val = $rep[$i][0];
                    $valaafficher = $rep[$i][1].' '.$rep[$i][2];
                    echo "<option name='numSite' value=\"".$val."\">$valaafficher</option><br/>";
                }
                ?>
            </select>
            

            <br/>
            <br/>

            <label> Type d'embarcation : </label><br/>
            <?php

                require_once "../backend/bddPlongee.php";
                $bdd = new bddPlongee();

                $req = "SELECT * FROM PLO_EMBARCATION";

                $embarcation = $bdd->exec($req);

                if(!empty($embarcation)){
                    for($i=0; $i<sizeof($embarcation); $i++){
                        echo " <label>
              <input class=\"with-gap\" name=\"type_embarcation\" value=".$embarcation[$i]['EMB_NUM']." type=\"radio\"  />
              <span>".$embarcation[$i]['EMB_NOM']."</span>
            </label><br/>";

                    }
                }

            ?>


            <br/>
            <br/>

            <label>Effectif plongeurs : </label><input type="number" name="effectifP"><br/>
            <label>Effectif bateau : </label><input type="number" name="effectifB">
            <label>Nombre palanquée : </label><input type="number" name="nombrePal">



            <br/>
            <br/>

            <label>Directeur de plongée : </label><br/>
            <label>Nom : </label>
            <select id="NomDirecteur" class="browser-default" name="directeurdeplongee">
                <option value = "">Sélectionnez un directeur</option>
                <?php
                require_once "../backend/bddPlongee.php";
                $bdd = new bddPlongee();

                $req = "select PER_NUM,PER_NOM, PER_PRENOM from PLO_PERSONNE JOIN PLO_DIRECTEUR USING(PER_NUM) ORDER BY PER_NOM";

                $rep = $bdd->exec($req);

                for($i = 0; $i<sizeof($rep); $i++){
                    $val = $rep[$i][0];
                    $valaafficher = $rep[$i][1].' '.$rep[$i][2];
                    echo "<option value=$val>$valaafficher</option><br/>";
                }?>
            </select>



            <br/>
            <br/>



            <label>Sécurité de surface : </label><br/>
            <label>Nom : </label>
            <select class="browser-default" id="NomSecuriteSurface" name="securitedesurface">
                <option value = "">Sélectionnez un personnel de sécurité de surface</option>

                <?php
                require_once "../backend/bddPlongee.php";
                $bdd = new bddPlongee();

                $requeteSecuriteSurface = "select PER_NUM,PER_NOM, PER_PRENOM from PLO_PERSONNE JOIN PLO_SECURITE_DE_SURFACE USING(PER_NUM) ORDER BY PER_NOM";

                $resultatSecuriteSurface = $bdd->exec($requeteSecuriteSurface);

                for($i = 0; $i<sizeof($resultatSecuriteSurface); $i++){
                    $vale = $resultatSecuriteSurface[$i][0];
                    $valaffiche = $resultatSecuriteSurface[$i][1].' '.$resultatSecuriteSurface[$i][2];
                    echo "<option value=$vale>$valaffiche</option><br/>";
                }?>
            </select>


            <br/>
            <br/>




            <br/>
            <br/>
            <button class="btn waves-effect waves-light green lighten-1" style="border-radius:10px;" type="submit" name="action">Créer la plongée
                <i class="material-icons right">send</i>
            </button>
            <button class="btn waves-effect waves-light red lighten-1" style="border-radius:10px;" type="reset" name="action">Effacer
                <i class="material-icons right">clear</i>
            </button>
            <button class="btn waves-effect waves-light grey darken-4" style="border-radius:10px;" value = "Retour"  onclick = "history.back()" style="margin:auto">
                Retour
            </button>
        </fieldset><br/>
    </form>
  </body>
</html>