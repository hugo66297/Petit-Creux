<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Petit Creux</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel="icon" type="image/png" href="img\logopetitcreux.png" />
    <style> 
header {
background-image: url("img\\enchiladas.jpg");
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
            <li><a href="deconnexion.html">Se deconnecter</a></li>
            </ul>
  </li>
	</ul>
	</div>
	
	<h1 id="logo"><img src="img\LOGOBO.png" alt="logo"></h1>
	
	<div>
	<ul class="bouton">
    <li><a id="button" href="#">Traduction</a></li>
	  <li><a id ="button" href="connexion.php">Connexion</a></li>
    <li><a id="signup" href="inscription.php">Inscription</a></li>
	</div>
  </nav>
  <div id="plat">
          <h2><?php $recette="Enchiladas au poulet";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 1h 15min</td>
          <td class="maintab"><form action="chiliconcarne.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
            $DEFAUT_PERS=8;
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
          echo "$personne";?> personnes</td>
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
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(16/$DEFAUT_PERS*$personne);
              echo "$qtt";?> tortillas de blé</td>
              <td class="imgingre"><img id="aliment" src="img\tortillas.jpg" alt="tortillas" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1.2/$DEFAUT_PERS*$personne;
              echo "$qtt";?> kg de blancs de poulet</td>
              <td class="imgingre"><img id="aliment" src="img\pouletblanc.jpg" alt="blanc de poulet" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(8/$DEFAUT_PERS*$personne);
              echo "$qtt";?> tomates</td>
              <td class="imgingre"><img id="aliment" src="img\tomate.jpg" alt="tomates" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> poivrons</td>
              <td class="imgingre"><img id="aliment" src="img\poivrons.jpg" alt="poivrons" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=4/$DEFAUT_PERS*$personne;
              echo "$qtt";?> oignons</td>
              <td class="imgingre"><img id="aliment" src="img\oignon.jpg" alt="oignon" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=6/$DEFAUT_PERS*$personne;
              echo "$qtt";?> gousses d'ail</td>
              <td class="imgingre"><img id="aliment" src="img\ail.jpg" alt="gousse d'ail" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=200/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de fromage cheddar</td>
              <td class="imgingre"><img id="aliment" src="img\cheddar.jpg" alt="fromage cheddar" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(10/$DEFAUT_PERS*$personne);
              echo "$qtt";?>c. à soupe de concentré de tomates</td>
              <td class="imgingre"><img id="aliment" src="img\tomate.jpg" alt="tomate" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?>c. à café d'origan séché</td>
              <td class="imgingre"><img id="aliment" src="img\origan.jpg" alt="origan" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(4/$DEFAUT_PERS*$personne);
              echo "$qtt";?>c. à café de paprika</td>
              <td class="imgingre"><img id="aliment" src="img\paprika.jpg" alt="paprika" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(4/$DEFAUT_PERS*$personne);
              echo "$qtt";?>c. à soupe de cumin</td>
              <td class="imgingre"><img id="aliment" src="img\cumin.jpg" alt="cumin" /></td>
              <td class="titreingre"></td>
              <td class="etape">- des petits piments (au goût)</td>
              <td class="imgingre"><img id="aliment" src="img\piment.jpg" alt="piment" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne);
              echo "$qtt";?>c. à soupe d'huile d'olive</td>
              <td class="imgingre"><img id="aliment" src="img\huileolive.jpg" alt="huile d'olive" /></td>
              <td class="titreingre"></td>
              <td class="etape">- sel, poivre du moulin</td>
              <td class="imgingre"><img id="aliment" src="img\seletpoivre.jpg" alt="sel et poivre" /></td>
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
          <td>Préchauffez le four th. 6 (180°C). Épluchez et hachez les oignons. Lavez et coupez les poivrons en lamelles. Coupez les escalopes de poulet en petits cubes. Hachez les gousses d'ail (gardez-en une pour la sauce)</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Dans une sauteuse, faites chauffer 1 c. à soupe d'huile d'olive. Puis faites revenir les oignons, ajoutez les poivrons puis les morceaux de poulet et les gousses d’ail pendant 5 min. Ajoutez ensuite les épices et les herbes ainsi que 4 c. à soupe de concentré de tomates</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Lavez les tomates, coupez-les en quartiers puis mixez-les. Ajoutez l'équivalent de 2 tomates mixées dans la sauteuse, réservez le reste. Continuez la cuisson jusqu’à ce que tout soit cuit</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Préparez une sauce tomate : dans une petite casserole, faites chauffer 1 c. à soupe d’huile d'olive avec la gousse d’ail hachée. Avant que l’ail ne dore, ajoutez 6 c. à soupe de concentré de tomates et le reste de tomates mixées. Versez un peu d’eau si nécessaire, ajoutez sel, poivre et piment coupé en petits dés. Mélangez, couvrez et laissez mijoter à feu doux pendant 5 min</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Préparez les enchiladas : farcissez-les tortillas avec la viande, roulez-les sur elles-mêmes et placez-les dans un plat à gratin. Recouvrez de sauce, de cheddar et enfournez pendant 30 min</td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p id="source">Source : CUISINEAZ</p>
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