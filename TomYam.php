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
background-image: url("img\\TomYam.jpg");
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
                <form id='deco' name='deco' method='post' action='TomYam.php'>
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
          <h2><?php $recette="Soupe Tom Yam";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 30min</td>
          <td class="maintab"><form action="TomYam.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
            $DEFAUT_PERS=6;
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
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> oignons</td>
              <td class="imgingre"><img id="aliment" src="img\onion.jpg" alt="oignon
              " /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> gousse d'ail </td>
              <td class="imgingre"><img id="aliment" src="img\ail.jpg" alt="ail" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">-<?php $qtt=round(30/$DEFAUT_PERS*$personne);
              echo "$qtt";?> crevettes</td>
              <td class="imgingre"><img id="aliment" src="img\crevettes.jpg" alt="crevettes" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> bouillon cube dans <?php $qtt=round(1/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> litre d'eau</td>
              <td class="imgingre"><img id="aliment" src="img\bouilloncube.jpg" alt="bouilloncube" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> carrottes</td>
              <td class="imgingre"><img id="aliment" src="img\carrotte.jpg" alt="carottes" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(200/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> g de pleurotes</td>
              <td class="imgingre"><img id="aliment" src="img\pleurotes.jpg" alt="pleurotes" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> bâtons de citronnelle</td>
              <td class="imgingre"><img id="aliment" src="img\citronelle.jpg" alt="citronnelle" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(20/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> g de gingembre</td>
              <td class="imgingre"><img id="aliment" src="img\gingembre.jpg" alt="gingembre" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(0.5/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> botte de coriandre</td>
              <td class="imgingre"><img id="aliment" src="img\coriandre.jpg" alt="coriandre" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> citron</td>
              <td class="imgingre"><img id="aliment" src="img\citronvert.jpg" alt="citronvert" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(20/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> cl de lait de coco</td>
              <td class="imgingre"><img id="aliment" src="img\laitcoco.jpg" alt="laitdecoco" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> cl de sauce nuoc nam</td>
              <td class="imgingre"><img id="aliment" src="img\nuocnam.png" alt="nuocnam" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cl d'huile</td>
              <td class="imgingre"><img id="aliment" src="img\huileolive.jpg" alt="huileolive" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(5/$DEFAUT_PERS*$personne);
              echo "$qtt";?> g de curry</td></td>
              <td class="imgingre"><img id="aliment" src="img\curry.jpg" alt="curry" /></td>
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
          <td>Laver et éplucher les carottes et les oignons nouveaux, puis les émincer en fines lamelles (garder la cive des oignons à part). Nettoyer les pleurotes et les effilocher à la main. Décortiquer les gambas en gardant le dernier anneau, et vérifier le boyau.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Éplucher et dégermer les gousses d'ail. Couper les tiges de citronnelle en tronçons de 2 à 3 cm. Émincer le gingembre en lamelles.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Dans un blender, mixer le lait de coco avec l'ail, la citronnelle et le gingembre, puis faire chauffer doucement le tout dans une casserole pendant 10 min pour infuser.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Laver et effeuiller la coriandre, puis la concasser grossièrement. Râper le zeste de citron vert et récupérer le jus.</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Dans un wok, faire chauffer un trait d'huile et faire sauter vivement les gambas pendant 2 min, puis les réserver. Dans le même wok, ajouter le blanc d'oignon, la carotte et les pleurotes, puis faire suer le tout pendant 2 à 3 min. Ajouter le bouillon de poulet et le lait de coco tout en le filtrant à l'aide d'un chinois fin, puis porter le tout à ébullition. Assaisonner ensuite de pâte de curry
               et de sauce nuoc-mâm. Pour finir, ajouter le jus et le zeste de citron vert, la cive, la coriandre et les gambas.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Rectifier l'assaisonnement et déguster bien chaud.</td>
          <td class="numdroite">6</td>
        </tr>
      </table>
      <p id="source">Source : ATELIER DES CHEFS</p>
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