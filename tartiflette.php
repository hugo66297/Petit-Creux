<?php
session_start()
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Petit Creux</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel="icon" type="image/png" href="img\logopetitcreux.png" />
    <style> 
header {
background-image: url("img\\tartiflette.jpg");
height: 450px;
background-size: cover;
border-top: 1px solid rgb(161, 161, 161, 0.541);
border-bottom: 10px solid black;
}
</style>
  </head>
  <body>
    <header id="main-head">
      <nav>
	<div>
	<ul class="bar">
    <li id="return" href="#" onclick = "history.go(-1)"><img src='img\arrow.png' alt="fleche"></li>
		<li><a id="button" href="#">Accueil</a></li>
    <li class="deroulant"><a id="button" href="#">Pays </a>
    <ul class="under">
                <li><a href="etatsunis.html">Etats-Unis</a></li>
                <li><a href="france.html">France</a></li>
                <li><a href="italie.html">Italie</a></li>
                <li><a href="japon.html">Japon</a></li>
                <li><a href="mexique.html">Mexique</a></li>
                <li><a href="vietnam.html">Vietnam</a></li>
                <li><a href="thailande.html">Thailande</a></li>
   </ul>
  </li>
  <li class="deroulant"><a>Mon compte</a>
            <ul class="under">
            <li><a href="informations.html">Informations</a></li>
            <li>
                <form id='deco' name='deco' method='post' action='tartiflette.php'>
                <input type='submit' id='deco' name="deco" value='Se déconnecter'/>
                </form><?php
                if(isset($_POST["deco"]) && isset($_SESSION)){
                  $_SESSION = array();
                  session_destroy();
                  unset($_SESSION);}
                ?>
            </li>
            </ul>
  </li>
	</ul>
	</div>
	
	<h1 id="logo"><img src="img\LOGOBO.png" alt="logo"></h1>
	
	<div>
	<ul class="bouton">
    <li><a id="button" href="#">Traduction</a></li>
	  <li><?php if(isset($_SESSION["email"]))
      echo "Hello " . $_SESSION["email"];
    else
    echo "<a id =\"button\" href=\"connexion.php\">Connexion</a></li>
    <li><a id=\"signup\" href=\"inscription.php\">Inscription</a>";?></li>
	</div>
  </nav>
  <div id="plat">
          <h2><?php $recette="Tartiflette Savoyarde";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 1h</td>
          <td class="maintab"><form action="tartiflette.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
            $DEFAUT_PERS=8;
            if(! empty($_SESSION["nbpers"]))
              $personne=$_SESSION["nbpers"];
            else{
            $personne=$DEFAUT_PERS;}?>
           <input class="boutonperso" type="submit" value=" + " name="plus"></form>
          <?php 
                if(isset($_POST["moins"]) && $personne>1)
                  $personne=$personne-1;
                if(isset($_POST["plus"]))
                  $personne=$personne+1;
                  $_SESSION["nbpers"]=$personne;
          echo "$personne";?> personnes</td>
          <td class="maintab">Note de la recette : <?php $nbtot=0;
          if(file_exists("avis.csv")){
            $fichier=file("avis.csv", FILE_IGNORE_NEW_LINES);
            $ligne=array();
            foreach($fichier as $f){
                $ligne[]=explode(";",$f);
            }
            $moy=0;
            foreach($ligne as $valeur){
                if(in_array($recette,$valeur)){
                    $moy=$moy+$valeur[1];
                    $nbtot=$nbtot+1;}}
                }
            if($nbtot==0)
                    $moy="Pas d'avis";
            else
                $moy=round($moy/$nbtot,1);
            echo "$moy";?>/5</td>
      </tr>
  </table>
    </header>
    <!-- Ici, on placera tout le contenu à destination
    de l'utilisateur -->
    <section id="contenu">
      <article id="ingre">
        <nav id="ingredients">
          <h3>Ingrédients</h3>
          <table style="display: inline-block;">
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=2.5/$DEFAUT_PERS*$personne;
              echo "$qtt";?> kg de pomme de terre</td>
              <td class="imgingre"><img id="aliment" src="img\pommedeterre.jpg" alt="pommedeterre" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=2/$DEFAUT_PERS*$personne;
              echo "$qtt";?> reblochons</td>
              <td class="imgingre"><img id="aliment" src="img\reblochon.jpg" alt="reblochon" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=20/$DEFAUT_PERS*$personne;
              echo "$qtt";?>cl de vin blanc de Savoie (Apremont si possible)</td>
              <td class="imgingre"><img id="aliment" src="img\vinblanc.jpg" alt="vinblanc" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=30/$DEFAUT_PERS*$personne;
              echo "$qtt";?> cl de crème fraiche</td>
              <td class="imgingre"><img id="aliment" src="img\creme.jpg" alt="creme" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=500/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de lardons fumés</td>
              <td class="imgingre"><img id="aliment" src="img\lardon.jpg" alt="lardon" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Sel</td>
              <td class="imgingre"><img id="aliment" src="img\sel.jpg" alt="sel" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- Poivre</td>
              <td class="imgingre"><img id="aliment" src="img\poivre.jpg" alt="poivre" /></td>
              <td class="titreingre"></td>
              <td class="etape"></td>
              <td class="imgingre"></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape"></td>
              <td class="imgingre"></td>
              <td class="titreingre"></td>
              <td class="etape"></td>
              <td class="imgingre"></td>
			  <td class="titreingre"></td>
            </tr>
          </table>
      </nav>
      </article>
    <article id="demarche">
      <h3>Étapes à suivre: </h3>
      <table id="tabdemarche">
        <tr>
          <td class="numgauche">1</td>
          <td>Cuire les pommes de terre à l’eau pendant 20 minutes, puis les éplucher et les couper en rondelles..</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Emincer les oignons et les faire revenir dans du beurre.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Ajouter les lardons fumés, les faire revenir à feu doux une bonne dizaine de minutes en remuant régulièrement.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Préparer un plat de cuisson (j’utilise un plat rond en terre cuite de 40 cm de diamètre, 10 cm de haut). Frotter le fond du plat avec une gousse d’ail.</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Organiser le plat en trois couches : recouvrir le fond du plat de la moitié des pommes de terre, puis ajouter le mélange oignons et lardons, ajouter enfin par dessus le reste des pommes de terre.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Verser dessus le vin blanc et la crème fleurette. Poivrer (assez copieusement) et saler (légèrement).</td>
          <td class="numdroite">6</td>
        </tr>
        <tr>
          <td class="numgauche">7</td>
          <td>Préchauffer le four à 190°C.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Gratter les reblochons, les couper en deux dans l'épaisseur et les poser (côté croûte en haut) sur le dessus des pommes de terre.</td>
          <td class="numdroite">8</td>
        </tr>
        <tr>
          <td class="numgauche">9</td>
          <td>Enfourner 20 minutes.
Au moment de servir, on peut saupoudrez d’un peu de persil haché.
Ce plat unique se déguste (c’est le mot juste !) accompagné du vin utilisé pour la recette.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p id="source">Source : MARMITON</p>
    </article>
    </section>
    <section id="commentaire">
    <article id="findepage">
    <h3>Commentaires : </h3>
      <?php if(file_exists("avis.csv")){
            $fichier=file("avis.csv", FILE_IGNORE_NEW_LINES);
            $ligne=array();
            foreach($fichier as $f){
                $ligne[]=explode(";",$f);
            }
            foreach($ligne as $tab)
            {
              if($tab[0]==$recette && ! empty($tab[3])){
                $com=htmlspecialchars($tab[2], ENT_QUOTES);
                echo "<p class=\"uncom\">" . $tab[3] . " a dit :<br><br>$com</p>\n";
              }
            }
          }
            ?>
            <p class="centrer-txt">
              Vous voulez laisser un <a id="mot-noir" href="form-avis.php">avis</a> ?
            </p>
    </article>
  </section>
  <footer>
		<span class='license'>&copy</span> <span class='author'>ERTAY</span>
	</footer>
  </body>
</html>