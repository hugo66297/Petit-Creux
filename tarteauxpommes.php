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
background-image: url("img\\tarteheader.jpg");
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
            <li>
                <form id='deco' name='deco' method='post' action='tarteauxpommes.php'>
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
          <h2><?php $recette="Tarte aux pommes";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 45min</td>
          <td class="maintab"><form action="tarteauxpommes.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
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
              <td class="titreingre"><B>Pour la pâte sablée aux amandes:</B></td>
              <td class="etape">- <?php $qtt=200/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de beurre mou</td>
              <td class="imgingre"><img id="aliment" src="img\butter.jpg" alt="beurre" /></td>
              <td class="titreingre"><B>Pour la garniture :</td>
              <td class="etape">- <?php $qtt=6/$DEFAUT_PERS*$personne;
              echo "$qtt";?> belles pommes</td>
              <td class="imgingre"><img id="aliment" src="img\pomme.jpg" alt="pomme" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> oeufs</td>
              <td class="imgingre"><img id="aliment" src="img\oeuf.jpg" alt="oeuf" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> oeufs</td>
              <td class="imgingre"><img id="aliment" src="img\oeuf.jpg" alt="oeuf" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=500/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de farine</td>
              <td class="imgingre"><img id="aliment" src="img\farine.jpg" alt="farine" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=50/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de sucre roux</td>
              <td class="imgingre"><img id="aliment" src="img\brown_sugar.jpg" alt="sucre roux" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- Une pincée de Sel</td>
              <td class="imgingre"><img id="aliment" src="img\sel.jpg" alt="sel" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Une pincée de Sel</td>
              <td class="imgingre"><img id="aliment" src="img\sel.jpg" alt="sel" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=80/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de poudre d'amandes (facultatif)</td>
              <td class="imgingre"><img id="aliment" src="img\amandes.jpg" alt="amandes" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=50/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g d'amandes effilées (facultatif)</td>
              <td class="imgingre"><img id="aliment" src="img\amandes.jpg" alt="amandes" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=50/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de sucre</td>
              <td class="imgingre"><img id="aliment" src="img\sucre.jpg" alt="sucre" /></td>
              <td class="titreingre"></td>
              <td class="etape">-<?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> gousse de Vanille (facultatif)</td>
              <td class="imgingre"><img id="aliment" src="img\vanille.jpg" alt="vanille" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=100/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de sucre glace</td>
              <td class="imgingre"><img id="aliment" src="img\sucre_glace.jpg" alt="sucre glace" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=2/$DEFAUT_PERS*$personne;
              echo "$qtt";?>c. à soupe de crème fraîche épaisse</td>
              <td class="imgingre"><img id="aliment" src="img\creme.jpg" alt="creme" /></td>
            </tr>
          </table>
      </nav>
      </article>
    <article id="demarche">
      <h3>Étapes à suivre: </h3>
      <table id="tabdemarche">
        <tr>
          <td class="numgauche">1</td>
          <td>Préchauffez votre four a 180°C</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Préparez la pâte 2 heures à l'avance. Mélangez le beurre, le sucre et le sucre glace</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Rajoutez la poudre d'amandes, puis les oeufs et enfin la farine et le sel. Mélangez jusqu'à l'obtention d'une boule de pâte. Couvrez de film alimentaire et mettez 2 heures au frigo</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Diviser la pâte en 2 (vous avez de quoi faire 2 tartes et pouvez congeler une portion de pâte pour plus tard...) et étalez sur un plan de travail fariné. Placez dans un moule à tarte beurré et fariné</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Préparez la crème d'amande : mélangez le sucre roux avec les oeufs , rajoutez la vanille, la poudre d'amande et la crème fraîche</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Disposez les pommes épluchées et coupées en gros quartiers dans le fond de la tarte, recouvrez avec la crème d'amande et parsemez d'amandes effilées, enfin, enfournez 45 min à 180°C</td>
          <td class="numdroite">6</td>
        </tr>
        <tr>
          <td class="numgauche">7</td>
          <td>Saupoudrez de sucre glace avant de servir.</td>
          <td></td>
          <td></td>
        </tr>
      </table>
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