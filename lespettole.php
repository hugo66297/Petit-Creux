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
            background-image: url("img\\pettole.jpg");
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
                <form id='deco' name='deco' method='post' action='lespettole.php'>
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
          <h2><?php $recette="Les pettole";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 30min</td>
          <td class="maintab"><form action="lespettole.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
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
              <td class="titreingre"><B>Pour la pâte :</B></td>
              <td class="etape">- <?php $qtt=500/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de farine</td>
              <td class="imgingre"><img id="aliment" src="img\farine.jpg" alt="beurre" /></td>
              <td class="titreingre"><B>Pour la farce :</td>
              <td class="etape">- Olives vertes et noires</td>
              <td class="imgingre"><img id="aliment" src="img\olives.jpg" alt="olive" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(12/$DEFAUT_PERS*$personne);
              echo "$qtt";?>g de levure de bière</td>
              <td class="imgingre"><img id="aliment" src="img\levure.jpg" alt="levure" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Tomates</td>
              <td class="imgingre"><img id="aliment" src="img\tomate.jpg" alt="tomate" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=0.5/$DEFAUT_PERS*$personne;
              echo "$qtt";?> cuillère a soupe de sel</td>
              <td class="imgingre"><img id="aliment" src="img\sel.jpg" alt="sel" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Câpres</td>
              <td class="imgingre"><img id="aliment" src="img\capres.png" alt="capres" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=375/$DEFAUT_PERS*$personne;
              echo "$qtt";?>ml d'eau tiède</td>
              <td class="imgingre"><img id="aliment" src="img\eau.jpg" alt="eau" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Sucre</td>
              <td class="imgingre"><img id="aliment" src="img\sucre.jpg" alt="sucre" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- Huile d'arachides pour frire</td>
              <td class="imgingre"><img id="aliment" src="img\huileolive.jpg" alt="huileolive" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Miel</td>
              <td class="imgingre"><img id="aliment" src="img\miel.jpg" alt="miel" /></td>
            </tr>
          </table>
      </nav>
      </article>
    <article id="demarche">
      <h3>Étapes à suivre: </h3>
      <table id="tabdemarche">
        <tr>
          <td class="numgauche">1</td>
          <td>Mettez la farine dans un bol et créez un trou où vous verserez la levure de bière fraîche fondue dans un peu d’eau tiède.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Dans un autre contenant, faites fondre le sel dans le reste de l’eau tiède que vous avez préparée et versez-la petit à petit dans la farine.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Pétrissez bien la pâte avec les mains pour qu’elle soit assez molle et gluante (si besoin, ajoutez encore un peu d’eau tiède).</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Pour avoir une pate homogène, ajoutez dès maintenant la garniture (olives, morceaux de câpres, tomates, …).</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Laissez-la lever pendant 2 heures environ dans le four, couverte avec du film plastique, jusqu’à ce que la pâte double de volume.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Faites chauffer une bonne quantité d’huile d’arachides. Lorsque l’huile est chaude (180° C. environ), prenez avec une cuillère à soupe (passée dans un verre d’eau chaude) une petite quantité de pâte, faites la glisser avec le doigt dans l’huile et laissez frire ces petites boules l’une après l’autre.</td>
          <td class="numdroite">6</td>
        </tr>
        <tr>
          <td class="numgauche">7</td>
          <td>Quand elles sont bien dorées, retirez-les et servez-les chaudes.</td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p id="source">Source : lacuisineitalienne.fr</p>
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