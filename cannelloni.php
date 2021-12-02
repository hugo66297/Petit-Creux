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
      background-image: url("img\\cannelloni.jpg");
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
		<li id ="return"><a href="#"><img src='img\arrow.png' alt="fleche"></a></li>
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
                <form id='deco' name='deco' method='post' action='cannelloni.php'>
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
          <h2><?php $recette="Cannelloni aux artichauts et jambon cru";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 90min</td>
          <td class="maintab"><form action="cannelloni.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
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
              <td class="etape">- <?php $qtt=10/$DEFAUT_PERS*$personne;
              echo "$qtt";?> cannelloni prêts</td>
              <td class="imgingre"><img id="aliment" src="img\cannelloni.jpg" alt="cannelloni" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=2/$DEFAUT_PERS*$personne;
              echo "$qtt";?> pommes de terre</td>
              <td class="imgingre"><img id="aliment" src="img\pommedeterre.jpg" alt="pommes de terre" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=3/$DEFAUT_PERS*$personne;
              echo "$qtt";?> artichauts</td>
              <td class="imgingre"><img id="aliment" src="img\artichaut.jpg" alt="artichauts" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> mozzarella</td>
              <td class="imgingre"><img id="aliment" src="img\mozzarella.jpg" alt="mozzarella" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=250/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de jambon cru</td>
              <td class="imgingre"><img id="aliment" src="img\jamboncru.jpg" alt="jambon cru" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=300/$DEFAUT_PERS*$personne;
              echo "$qtt";?>ml de béchamel</td>
              <td class="imgingre"><img id="aliment" src="img\bechamel.jpg" alt="béchamel" /></td>
              <td class="titreingre"></td>
            </tr> 
 <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> verre de vin blanc sec</td>
              <td class="imgingre"><img id="aliment" src="img\vinblanc.jpg" alt="vin blanc sec" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> gousse d’ail</td>
              <td class="imgingre"><img id="aliment" src="img\ail.jpg" alt="ail" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- Du parmesan Reggiano râpé</td>
              <td class="imgingre"><img id="aliment" src="img\sucre_glace.jpg" alt="Parmesan" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Huile d’olive vierge extra</td>
              <td class="imgingre"><img id="aliment" src="img\huileolive.jpg" alt="Huile d’olive" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- Du sel</td>
              <td class="imgingre"><img id="aliment" src="img\sel.jpg" alt="sel" /></td>
              <td class="titreingre"></td>
              <td class="etape">- Du poivre</td>
              <td class="imgingre"><img id="aliment" src="img\poivre.jpg" alt="poivre" /></td>
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
          <td>Il faut avant tout effeuiller les artichauts en éliminant les feuilles les plus dures, la queue, les pointes épineuses et le foin au centre du légume. Coupez les artichauts en quartiers et laissez-les tremper dans de l’eau et du jus de citron.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Dans une casserole faites cuire les pommes de terre à l’eau.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Entre-temps chauffez une cuillérée d’huile dans une poêle et faites-y revenir une gousse d’ail, puis ajoutez les artichauts bien égouttés. Laissez-les cuire à feu moyen-doux jusqu’à ce qu’ils commencent à s’attendrir.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Baignez avec un verre de vin blanc sec et terminez la cuisson. Lorsqu’ils seront devenus bien tendres, contrôlez que toutes les feuilles soient vraiment bien cuites. Dans le cas contraire, éliminez-les.</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Lorsque les pommes de terre seront prêtes, égouttez-les et laissez-les tiédir avant de les peler. Coupez-les en morceaux et faites-les revenir dans la poêle avec les artichauts afin de leur donner du goût. Quelques minutes suffiront. Versez les pommes de terre et les artichauts dans le mixeur, ajoutez-y aussi le jambon cuit et hachez grossièrement.</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>À ce point vous pouvez farcir les cannellonis déjà prêts avec la farce. Remplissez-les à moitié, introduisez un petit morceau de mozzarella puis de nouveau la farce. Versez un peu de béchamel sur le fond d’un plat allant au four, y déposez les cannellonis et recouvrez de béchamel. Saupoudrez de parmesan reggiano. Faites cuire au four à 180° pendant 30 minutes.</td>
          <td class="numdroite">6</td>
        </tr>
        <tr>
          <td class="numgauche">7</td>
          <td>Servez après avoir laissé tiédir pendant quelques minutes.</td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p id="source">Source : recettes-italiennes.org</p>
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