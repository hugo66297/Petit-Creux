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
            background-image: url("img\\boulecoco.jpg");
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
                <form id='deco' name='deco' method='post' action='BouleCoco.php'>
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
	  <li><a id ="button" href="connexion.php">Connexion</a></li>
    <li><?php if(isset($_SESSION["email"]))
      echo "Hello " . $_SESSION["email"];
    else
    echo "<a id =\"button\" href=\"connexion.php\">Connexion</a></li>
    <li><a id=\"signup\" href=\"inscription.php\">Inscription</a>";?></li>
	</div>
  </nav>
  <div id="plat">
          <h2><?php $recette="Boule coco";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 1h 30min</td>
          <td class="maintab"><form action="BouleCoco.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
            $DEFAUT_PERS=11;
            if(file_exists("nbpers.txt"))
              $personne=file_get_contents("nbpers.txt");
            else{
            $personne=$DEFAUT_PERS;}?>
           <input class="boutonperso" type="submit" value=" + " name="plus"></form>
          <?php 
                if(isset($_POST["moins"]) && $personne>1)
                  $personne=$personne-1;
                if(isset($_POST["plus"]))
                  $personne=$personne+1;
                file_put_contents("nbpers.txt","$personne");
          echo "$personne";?> boules coco</td>
          <td class="maintab">Note de la recette : <?php $fichier=file("avis.csv", FILE_IGNORE_NEW_LINES);
            $ligne=array();
            foreach($fichier as $f){
                $ligne[]=explode(";",$f);
            }
            
            $moy=0;
            $nbtot=0;
            foreach($ligne as $valeur){
                if(in_array($recette,$valeur)){
                    $moy=$moy+$valeur[1];
                    $nbtot=$nbtot+1;}}
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
              <td class="titreingre"><B>Pour la farce:</B></td>
              <td class="etape">- <?php $qtt=round(50/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> g de haricots mungo décortiqués (de couleur jaune)</td>
              <td class="imgingre"><img id="aliment" src="img\haricotmungo.jpg" alt="haricotmungo" /></td>
              <td class="titreingre"><B>Pour la pâte :</td>
              <td class="etape">- <?php $qtt=round(250/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> g de farine de riz gluant</td>
              <td class="imgingre"><img id="aliment" src="img\farine.jpg" alt="farine" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(40/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?> g de noix de coco rapé</td>
              <td class="imgingre"><img id="aliment" src="img\cocorape.jpg" alt="cocorape" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(20/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cl d'eau chaude</td>
              <td class="imgingre"><img id="aliment" src="img\eau.jpg" alt="eau" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(30/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?>g de sucre</td>
              <td class="imgingre"><img id="aliment" src="img\sucre.jpg" alt="sucre" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(50/$DEFAUT_PERS*$personne,1);
              echo "$qtt";?>g de sucre </td>
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
          <td>Faites cuire les haricots mungo 45 min dans de l’eau bouillante.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Mixez finement les haricots mungo égouttés avec le sucre et la noix de coco.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Formez des petites boules avec cette pâte, d’environ 1,5 ou 2 cm de diamètre.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Dans un bol, mélangez la farine de riz gluant avec le sucre et l’eau bouillante. Mélangez à l’aide d’une cuillère puis finissez de travailler la pâte à la main. Elle doit être souple et maniable.</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Prélevez des boules de pâte de riz, aplatissez-les en un disque et entourez les boules de haricots jaunes. Refermez bien pour avoir une boule blanche toute ronde.
            On compte environ une boule de 10 g de farce et une boule de 35 g de pâte au riz gluant.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Façonnez ainsi une dizaine de boules de coco.</td>
          <td class="numdroite">6</td>
        </tr>
        <tr>
          <td class="numgauche">7</td>
          <td>Faites-les cuire 15 min au cuit vapeur et roulez-les dans de la noix de coco râpée dès la fin de la cuisson.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Dégustez les boules de coco asiatiques sans attendre et réchauffez-les 1 min au micro-onde avant de les servir. Attention, les boules de coco durcissent vites. Il est déconseillé de les faire trop longtemps en avance.</td>
          <td class="numdroite">8</td>
        </tr>
      </table>
      <p id="source">Source : Ô DELICE</p>
    </article>
    </section>
    <section id="commentaire">
    <article id="findepage">
      <h3>Commentaires : </h3>
      <?php $fichier=file("avis.csv", FILE_IGNORE_NEW_LINES);
            $ligne=array();
            foreach($fichier as $f){
                $ligne[]=explode(";",$f);
            }
           foreach($ligne as $tab)
            {
              if($tab[0]==$recette && ! empty(trim($tab[2]))){
                $com=htmlspecialchars($tab[2], ENT_QUOTES);
                echo "<p class=\"uncom\">$com</p>\n";
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
