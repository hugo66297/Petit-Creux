<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Petit Creux</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel="icon" type="image/png" href="img\logopetitcreux.png" />
    <style> 

  header {
  background-image: url("img\\nems.jpg");
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
          <h2><?php $recette="Nems";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 60min</td>
          <td class="maintab"><form action="nems.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
            $DEFAUT_PERS=2;
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
              <td class="etape">- <?php $qtt=round(250/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?>g de porc hâché</td>
              <td class="imgingre"><img id="aliment" src="img\porc.jpg" alt="porc" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> oignon</td>
              <td class="imgingre"><img id="aliment" src="img\oignon.jpg" alt="oignon" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> carotte</td>
              <td class="imgingre"><img id="aliment" src="img\carotte.jpg" alt="carotte" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(6/$DEFAUT_PERS*$personne);
              echo "$qtt";?> champignons chinois</td>
              <td class="imgingre"><img id="aliment" src="img\champignons.jpg" alt="champignons" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> poignée de vermicelles de riz</td>
              <td class="imgingre"><img id="aliment" src="img\vermicelle.jpg" alt="vermicelle" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> poignée de germes de soja</td>
              <td class="imgingre"><img id="aliment" src="img\soja.jpg" alt="soja" /></td>
              <td class="titreingre"></td>
            </tr> 
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne);
              echo "$qtt";?> oeufs</td>
              <td class="imgingre"><img id="aliment" src="img\oeuf.jpg" alt="oeuf" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> gousses d'ail</td>
              <td class="imgingre"><img id="aliment" src="img\ail.jpg" alt="ail" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> Galette de riz vietnamiennes
              </td>
              <td class="imgingre"><img id="aliment" src="img\galetteriz.jpg" alt="galetteriz" /></td>
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
          <td>Préparation de la farce : Faites tremper les champignons parfumés dans de l'eau froide pendant 30 min(au moins) et faites tremper les vermicelles dans de l'eau froide pendant 10 min</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Mixez et mélangez le porc, l'oignon, la carotte, les champigons, les vermicelles, les germes de soja et les oeufs. Rajoutez un peu de poivre et le nuoc mam pour l'assaisonnement.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Pour rouler les nems : Trempez une galette de riz dans l'eau chaude et étalez-la sur un torchon(Roulez la galette rapidement). </td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Déposez une cuillère à soupe de farce sur un bord et rouler la galette.La cuisson : Faites frire à feu moyen jusqu'à ce qu'ils soient bien dorés</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Et voila, le tour est joué ! Servez les nems avec des feuilles de salade, de menthe et de coriandre. On peux tremper les nems dans de la sauce pour nems : mélange de nuoc mam, d'eau, de jus de citron et de purée de piments.</td>
          <td></td>
          <td></td>
        </tr>

      </table>
      <p id="source">Source : Nous</p>
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