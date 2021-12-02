<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Petit Creux</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel="icon" type="image/png" href="img\logopetitcreux.png" />
    <style> 
header {
background-image: url("img\\saladeriz.jpg");
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
          <h2><?php $recette="Salade de riz rouge mexicaine";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 30min</td>
          <td class="maintab"><form action="salade-de-riz.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
            $DEFAUT_PERS=4;
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
              <td class="etape">- <?php $qtt=250/$DEFAUT_PERS*$personne;
              echo "$qtt";?>g de riz rouge</td>
              <td class="imgingre"><img id="aliment" src="img\riz.jpg" alt="riz" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> boîte de maïs en conserve</td>
              <td class="imgingre"><img id="aliment" src="img\mais.jpg" alt="maïs" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> boîte de haricots rouges</td>
              <td class="imgingre"><img id="aliment" src="img\haricot-rouge.jpg" alt="haricot rouge" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=2/$DEFAUT_PERS*$personne;
              echo "$qtt";?> carottes</td>
              <td class="imgingre"><img id="aliment" src="img\carrotte.jpg" alt="carrotte" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> poivron rouge</td>
              <td class="imgingre"><img id="aliment" src="img\poivrons.jpg" alt="poivron rouge" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=2/$DEFAUT_PERS*$personne;
              echo "$qtt";?> poivron jaune</td>
              <td class="imgingre"><img id="aliment" src="img\poivrons.jpg" alt="poivrons jaune" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> oignon rouge</td>
              <td class="imgingre"><img id="aliment" src="img\oignon-rouge.jpg" alt="oignon rouge" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(4/$DEFAUT_PERS*$personne);
              echo "$qtt";?>c. à soupe d’huile d’olive</td>
              <td class="imgingre"><img id="aliment" src="img\huileolive.jpg" alt="huile d'olive" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> citron vert</td>
              <td class="imgingre"><img id="aliment" src="img\citronvert.jpg" alt="citron vert" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=1/$DEFAUT_PERS*$personne;
              echo "$qtt";?> gousse d’ail</td>
              <td class="imgingre"><img id="aliment" src="img\ail.jpg" alt="gousse d'ail" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(0.5/$DEFAUT_PERS*$personne);
              echo "$qtt";?>c. à café de paprika en poudre</td>
              <td class="imgingre"><img id="aliment" src="img\paprika.jpg" alt="paprika" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(0.5/$DEFAUT_PERS*$personne);
              echo "$qtt";?>c. à café de cumin en poudre</td>
              <td class="imgingre"><img id="aliment" src="img\cumin.jpg" alt="cumin" /></td>
			  <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">Sel, poivre</td>
              <td class="imgingre"><img id="aliment" src="img\seletpoivre.jpg" alt="sel et poivre" /></td>
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
          <td>Faites cuire le riz selon les instructions du paquet, puis égouttes et laissez refroidir</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Lavez les poivrons, retirez les graines et les membranes blanches, détaillez-les en lanières. Épluchez les carottes et râpez-les à la grosse râpe. Égouttez le maïs et les haricots. Pelez et émincez l’oignon</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Pelez et écrasez l’ail. Mélangez-le dans un bol avec les épices, l’huile, le jus du citron vert, du sel et du poivre</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Dans un saladier, mélangez le riz cuit avec les légumes et la sauce. Tournez pour bien enrober</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Corrigez l’assaisonnement si besoin, et servez</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Rectifiez l'assaisonnement selon votre goût et servez</td>
          <td class="numdroite">6</td>
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