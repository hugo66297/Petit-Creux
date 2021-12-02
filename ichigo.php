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
            background-image: url("img\\ichigo.jpg");
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
                <form id='deco' name='deco' method='post' action='ichigo.php'>
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
          <h2><?php $recette="Ichigo daifuku (mochi aux haricots rouges et fraise)";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 35min</td>
          <td class="maintab"><form action="ichigo.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
            $DEFAUT_PERS=3;
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
              <td class="etape">- <?php $qtt=round(80/$DEFAUT_PERS*$personne);
              echo "$qtt";?>g de farine de riz shiratama</td>
              <td class="imgingre"><img id="aliment" src="img\shiratama.jpg" alt="riz" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=120/$DEFAUT_PERS*$personne;
              echo "$qtt";?>ml d'eau</td>
              <td class="imgingre"><img id="aliment" src="img\eau.jpg" alt="eau" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(6/$DEFAUT_PERS*$personne);
              echo "$qtt";?> fraises moyennes</td>
              <td class="imgingre"><img id="aliment" src="img\fraise.jpg" alt="fraise" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=180/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de pâte de haricots rouges</td>
              <td class="imgingre"><img id="aliment" src="img\haricot-rouge.jpg" alt="haricot rouge" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillères à sucre de fécule katakuri ko</td>
              <td class="imgingre"><img id="aliment" src="img\katakuriko.jpg" alt="katakuri ko" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(20/$DEFAUT_PERS*$personne);
              echo "$qtt";?>g de sucre</td>
              <td class="imgingre"><img id="aliment" src="img\sucre.jpg" alt="sucre" /></td>
            </tr>
          </table>
      </nav>
      </article>
    <article id="demarche">
      <h3>Étapes à suivre: </h3>
      <table id="tabdemarche">
        <tr>
          <td class="numgauche">1</td>
          <td>Rincer les fraises et essuyer-les. Se mouiller les mains et faire autant de boulettes que de fraises avec environ 25g de pâte de haricots rouges chacune</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Une fois les boulettes prêtes, les aplatir et les enrober autour des fraises. S’il y a un trou sur le sommet, ne pas s’inquiéter, il sera utile par la suite</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Préparer la pâte gluante : mélanger la farine de riz avec l’eau. Une fois mélangée, rajouter le sucre puis verser dans un récipient passant au micro-onde, couvert de film alimentaire</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Faire chauffer 2min au micro-onde. Mélanger la pâte et ajouter 1 cuillère à café d’eau si elle est trop solide. Ne pas ajouter trop d’eau</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Remettre le récipient au micro-onde 1 min. Dans un même temps, pour étaler la pâte, parsemer le plan de travail de katakuriko et s’en mettre dans les mains pour que cela ne colle pas</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Enfin, faire une boule avec la pâte et la séparer en autant de part que de fraises. Comme pour la pâte de haricots, aplatir la pâte et enrober les fraises. Quand elles sont complètement couvertes, les rouler dans ses paumes de main pour les rendre homogènes et finalement aplatir la base</td>
          <td class="numdroite">6</td>
        </tr>
        <tr>
          <td class="numgauche">7</td>
          <td>Déguster alors le dessert.</td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p id="source">Source : JAPANCENTRE</p>
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