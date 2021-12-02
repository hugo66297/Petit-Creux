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
            background-image: url("img\\gyoza.jpg");
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
		<li><a id="button" href="home.html">Accueil</a></li>
    <li class="deroulant"><a id="button" href="#">Pays</a>
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
                <form id='deco' name='deco' method='post' action='gyoza.php'>
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
          <h2><?php $recette="Gyoza";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 60min</td>
          <td class="maintab"><form action="gyazo.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
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
              <td class="etape">- <?php $qtt=round(200/$DEFAUT_PERS*$personne);
              echo "$qtt";?>g de porc haché</td>
              <td class="imgingre"><img id="aliment" src="img\boeuf-hachee.jpg" alt="boeuf haché" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=4/$DEFAUT_PERS*$personne;
              echo "$qtt";?> feuilles de chou chinois</td>
              <td class="imgingre"><img id="aliment" src="img\chou.jpg" alt="chou chinois" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(50/$DEFAUT_PERS*$personne);
              echo "$qtt";?>g de ciboule de Chine</td>
              <td class="imgingre"><img id="aliment" src="img\ciboule.jpg" alt="ciboule de Chine" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?> morceau de gingembre</td>
              <td class="imgingre"><img id="aliment" src="img\gingembre.jpg" alt="gingembre" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillères à café d’huile de sésame grillé</td>
              <td class="imgingre"><img id="aliment" src="img\sesame.jpg" alt="sésame" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillère à soupe de sauce soja</td>
              <td class="imgingre"><img id="aliment" src="img\soja-sauce.jpg" alt="sauce soja" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillère à soupe de saké de cuisine</td>
              <td class="imgingre"><img id="aliment" src="img\sake.jpg" alt="katakuri ko" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Pousse d’épinard</td>
              <td class="imgingre"><img id="aliment" src="img\epinards.jpg" alt="sucre" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> poivre</td>
              <td class="imgingre"><img id="aliment" src="img\poivre.jpg" alt="katakuri ko" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Huile vegetale</td>
              <td class="imgingre"><img id="aliment" src="img\huile-vegetale.jpg" alt="sucre" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(40/$DEFAUT_PERS*$personne);
              echo "$qtt";?> feuilles de pâtes de gyoza</td>
              <td class="imgingre"><img id="aliment" src="img\feuille.jpg" alt="katakuri ko" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Vinaigre de riz</td>
              <td class="imgingre"><img id="aliment" src="img\vinaigre.jpg" alt="sucre" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- Râyu (huile de sésame pimentée)</td>
              <td class="imgingre"><img id="aliment" src="img\sesame.jpg" alt="Râyu (huile de sésame pimentée)" /></td>
              <td class="titreingre"></td>
              <td class="etape"></td>
              <td class="imgingre"></td>
            </tr>
          </table>
      </nav>
      </article>
    <article id="demarche">
      <h3>Étapes à suivre: </h3>
      <table id="tabdemarche">
        <tr>
          <td class="numgauche">1</td>
          <td>Hacher le chou et le faire dégorger avec du sel. Le mettre dans un tissu et l’égoutter</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Hacher le nira et le dégorger et sécher de la même façon que le chou</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Couper le gingembre en lamelle</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Pour faire la farce : mettre le porc dans un bol avec le chou chinois, le nira, le gingembre, l’huile de sésame, la sauce soja et le saké et mélanger le tout</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Faire la forme de gyozas. Prendre une feuille de pâte de gyoza et mettre 1 cuillère à café de farce sur le milieu. Imprégner le bord de la pâte avec un peu d’eau et la fermer en la pliant en deux et en la plissant. Faire de même avec le reste des feuilles</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Faire la forme de gyozas. Prendre une feuille de pâte de gyoza et mettre 1 cuillère à café de farce sur le milieu. Imprégner le bord de la pâte avec un peu d’eau et la fermer en la pliant en deux et en la plissant. Faire de même avec le reste des feuilles</td>
          <td class="numdroite">6</td>
        </tr>
        <tr>
          <td class="numgauche">7</td>
          <td>Possibilité de faire une sauce, pour accompagner le plat, composée de sauce soja, de vinaigre et de râyu.</td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p id="source">Source : cuisine-japonaise</p>
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