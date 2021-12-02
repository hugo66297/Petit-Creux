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
background-image: url("img\\massaman.jpg");
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
                <form id='deco' name='deco' method='post' action='massaman.php'>
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
          <h2><?php $recette="Massaman";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 45min</td>
          <td class="maintab"><form action="massaman.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
            $DEFAUT_PERS=4;
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
              <td class="etape">- <?php $qtt=round(450/$DEFAUT_PERS*$personne);
              echo "$qtt";?>g de poulet</td>
              <td class="imgingre"><img id="aliment" src="img\poulet.jpg" alt="poulet" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1.5/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> cuillère à soupe</td>
              <td class="imgingre"><img id="aliment" src="img\brown_sugar.jpg" alt="sucreroux" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(500/$DEFAUT_PERS*$personne);
              echo "$qtt";?> ml de lait de coco </td>
              <td class="imgingre"><img id="aliment" src="img\laitcoco.jpg" alt="laitcoco" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> pomme de terre</td>
              <td class="imgingre"><img id="aliment" src="img\pommedeterre.jpg" alt="pommedeterre" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> cuillère à soupe de curry</td>
              <td class="imgingre"><img id="aliment" src="img\curry.jpg" alt="currys" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?> echalotes </td>
              <td class="imgingre"><img id="aliment" src="img\echalote.jpg" alt="echalote" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> cuillères à soupe de concentré de tamarin</td>
              <td class="imgingre"><img id="aliment" src="img\tamarin.jpg" alt="tamarin" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> gousse de cardamome</td>
              <td class="imgingre"><img id="aliment" src="img\cardamome.png" alt="cardamome" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> grosse poignée de cacahuètes</td>
              <td class="imgingre"><img id="aliment" src="img\cacahuetes.jpg" alt="cacahuetes" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> cuillères à soupe de sauce nuoc nam</td>
              <td class="imgingre"><img id="aliment" src="img\nuocnam.png" alt="uocnam" /></td>
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
          <td>Dans une grande poêle, sur feu moyen, verser le curry.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Ajouter le lait de coco et mélanger pour que le curry se mélange totalement.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Couper les pommes de terre en morceaux ainsi que le poulet.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Les ajouter au mélange lait de coco-curry.</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Verser le concentré de tamarin, la sauce nuoc mam et le sucre roux. Mélanger</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Pendant ce temps, écraser grossièrement les cacahuètes et ciseler les échalotes.</td>
          <td class="numdroite">6</td>
        </tr>
        <tr>
          <td class="numgauche">7</td>
          <td>Les ajouter au mélange</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Ajouter les gousses de cardamome.</td>
          <td class="numdroite">8</td>
        </tr>
        <tr>
          <td class="numgauche">9</td>
          <td>Laisser sur le feu le temps que les pommes de terre cuisent (à ce stade il reste généralement 15-20 minutes de cuisson)</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Ajouter les gousses de cardamome.</td>
          <td class="numdroite">10</td>
        </tr>
        <tr>
          <td class="numgauche">11</td>
          <td>Pendant ce temps vous pouvez préparer votre riz</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Servir bien chaud.</td>
          <td class="numdroite">12</td>
        </tr>
      </table>
      <p id="source">Source : CUISINE MOI UN MOUTON</p>
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