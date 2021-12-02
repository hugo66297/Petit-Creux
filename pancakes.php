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
  background-image: url("img\\pancakes.jpg");
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
                <form id='deco' name='deco' method='post' action='pancakes.php'>
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
          <h2><?php $recette="Pancakes";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 10min</td>
          <td class="maintab"><form action="pancakes.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
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
              <td class="etape">- <?php $qtt=round(20/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?>cl de lait</td>
              <td class="imgingre"><img id="aliment" src="img\lait.jpg" alt="lait" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(175/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?>g de farine de blé</td>
              <td class="imgingre"><img id="aliment" src="img\farine.jpg" alt="farine" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne);
              echo "$qtt";?> oeufs</td>
              <td class="imgingre"><img id="aliment" src="img\oeuf.jpg" alt="oeuf" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillères à soupe de sucre en poudre</td>
              <td class="imgingre"><img id="aliment" src="img\sucrepoudre.jpg" alt="sucrepoudre" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillère à soupe d'huile d'olive</td>
              <td class="imgingre"><img id="aliment" src="img\huileolive.jpg" alt="huileolive" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillère à café de sel</td>
              <td class="imgingre"><img id="aliment" src="img\sel.jpg" alt="sel" /></td>
              <td class="titreingre"></td>
            </tr> 
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php 
              echo "$qtt";?> sachet de levure chimique</td>
              <td class="imgingre"><img id="aliment" src="img\levurechimique.jpg" alt="levurechimique" /></td>
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
          <td>Dans un saladier, mélangez les œufs avec le lait et le sucre.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td> Dans un autre saladier, mélangez la farine avec la levure et le sel.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Creusez un puit pour y verser la préparation œufs-sucre-lait.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Ajoutez l’huile et mélangez le tout pour obtenir une pâte bien lisse.</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td> Faites fondre un peu de beurre dans une poêle chaude et versez une louche de votre préparation à pancakes</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Laissez cuire 2 minutes environ (le pancake doit être doré et ne plus coller à la poêle) avant de retourner délicatement votre pancake et laissez cuire à nouveau 2 minutes sur l’autre face. </td>
          <td class="numdroite">6</td>
        </tr>
        <tr>
          <td class="numgauche">7</td>
          <td>Dégustez les pancakes tièdes ou refroidis.</td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p id="source">Source : Mes Recettes Faciles</p>
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