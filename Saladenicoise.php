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
background-image: url("img\\saladenicoise.jpg");
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
                <form id='deco' name='deco' method='post' action='Saladenicoise.php'>
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
          <h2><?php $recette="Salade Niçoise";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 30min</td>
          <td class="maintab"><form action="Saladenicoise.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
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
              <td class="etape">- <?php $qtt=round(5/$DEFAUT_PERS*$personne);
              echo "$qtt";?> Tomates</td>
              <td class="imgingre"><img id="aliment" src="img\tomate.jpg" alt="tomates" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(0.5/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> concombre</td>
              <td class="imgingre"><img id="aliment" src="img\concombre.jpg" alt="concombre" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(100/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?> g de fevette épluchées </td>
              <td class="imgingre"><img id="aliment" src="img\fevette.jpg" alt="fevette" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=6/$DEFAUT_PERS*$personne;
              echo "$qtt";?> petits artichauts du pays</td>
              <td class="imgingre"><img id="aliment" src="img\artichaut.jpg" alt="artichaut" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?>Poivron vert</td>
              <td class="imgingre"><img id="aliment" src="img\PoivronVert.jpg" alt="PoivronVert" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?> petits oignons</td>
              <td class="imgingre"><img id="aliment" src="img\onion.jpg" alt="onion" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(10/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?> feuilles de basilic</td>
              <td class="imgingre"><img id="aliment" src="img\basilic.jpg" alt="basilic" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?> gousse d’ail</td>
              <td class="imgingre"><img id="aliment" src="img\ail.jpg" alt="ail" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne);
              echo "$qtt";?> oeufs</td>
              <td class="imgingre"><img id="aliment" src="img\oeuf.jpg" alt="oeuf" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=6/$DEFAUT_PERS*$personne;
              echo "$qtt";?> filets d’anchois</td>
              <td class="imgingre"><img id="aliment" src="img\anchois.jpg" alt="anchois" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(50/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?> g d'olives</td>
              <td class="imgingre"><img id="aliment" src="img\olives.jpg" alt="olives" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(4/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillères à soupe d’huile d’olive</td>
              <td class="imgingre"><img id="aliment" src="img\huileolive.jpg" alt="huileolive" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- Sel</td>
              <td class="imgingre"><img id="aliment" src="img\sel.jpg" alt="sel" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Poivre</td>
              <td class="imgingre"><img id="aliment" src="img\poivre.jpg" alt="poivre" /></td>
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
          <td>Lavez les tomates, coupez-les en quartiers et salez-les. Au moment de préparer la salade, égouttez-les bien.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Portez à ébullition une casserole d’eau. Quand elle bout, plongez-y les oeufs pour 10 minutes de cuisson. Egouttez et rafraichissez-les dans l’eau glacée.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Tourner les artichauts et émincez-les. Pelez les fèves. Découpez les oeufs en rondelles. Lavez, épluchez et émincez le concombre, le poivrons et les oignons. Pour le concombre, j’enlève toujours les graines à l’intérieur</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Frottez le saladier avec la gousse d’ail pelée et remplissez-le avec tous les légumes. Ajoutez bien sur les olives noires de Nice (non dénoyautées, c’est meilleur) et les anchois, coupés en morceaux.</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Faites une sauce avec l’huile, le basilic émincé, puis assaisonnez de sel (allez y doucement, vous avez déjà salé les tomates) et de poivre. Versez sur le saladier et dégustez immédiatement.</td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p id="source">Source : PAPILLES & PUPILLES</p>
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