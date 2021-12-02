<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Petit Creux</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel="icon" type="image/png" href="img\logopetitcreux.png" />
    <style> 
        header {
            background-image: url("img\\quesadillas.jpg");
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
          <h2><?php $recette="Quesadillas au fromage";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 30min</td>
          <td class="maintab"><form action="quesadillas.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
            $DEFAUT_PERS=3;
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
              <td class="etape">- <?php $qtt=round(250/$DEFAUT_PERS*$personne);
              echo "$qtt";?>g de fromage râpé (cheddar ou gruyère)</td>
              <td class="imgingre"><img id="aliment" src="img\cheddar.jpg" alt="cheddar" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(16/$DEFAUT_PERS*$personne);
              echo "$qtt";?> tortillas de blé moyennes</td>
              <td class="imgingre"><img id="aliment" src="img\tortillas.jpg" alt="tortillas" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> botte d’oignons frais</td>
              <td class="imgingre"><img id="aliment" src="img\oignon.jpg" alt="oignon" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> bouquet de coriandre fraîche</td>
              <td class="imgingre"><img id="aliment" src="img\coriandre.jpg" alt="oeuf" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(3/$DEFAUT_PERS*$personne);
              echo "$qtt";?> piments rouges</td>
              <td class="imgingre"><img id="aliment" src="img\piment.jpg" alt="piment" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(250/$DEFAUT_PERS*$personne);
              echo "$qtt";?>ml de sauce salsa</td>
              <td class="imgingre"><img id="aliment" src="img\salsa.jpg" alt="sauce salsa" /></td>
            </tr>
            <tr>
            <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(250/$DEFAUT_PERS*$personne);
              echo "$qtt";?>ml de guacamole</td>
              <td class="imgingre"><img id="aliment" src="img\guacamole.jpg" alt="guacamole" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(100/$DEFAUT_PERS*$personne);
              echo "$qtt";?>g de crème fraîche épaisse</td>
              <td class="imgingre"><img id="aliment" src="img\creme.jpg" alt="creme fraiche" /></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- sel fin et poivre noir du moulin</td>
              <td class="imgingre"><img id="aliment" src="img\seletpoivre.jpg" alt="sel et poivre" /></td>
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
          <td>Epluchez et hachez finement les oignons. Lavez, séchez soigneusement et hachez également la coriandre. Coupez, dégrainez et hachez les piments</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Dans un grand saladier, mélangez ensemble le fromage râpé avec les piments, les oignons et la coriandre hachés. Assaisonnez à votre convenance avec le sel et le poivre</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Etalez le mélange obtenu sur les tortillas puis déposez un peu de guacamole par-dessus. Repliez les tortillas en deux en les pressant légèrement</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Faites chauffer une poêle sans ajouter de matières grasses</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Lorsque la poêle est bien chaude, faites revenir vos quesadillas au fromage quelques minutes sur chaque face jusqu’à ce que le fromage soit complètement fondu</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Coupez vos quesadillas au fromage en quatre parts égales puis servez-les avec de la sauce salsa, du guacamole et de la crème épaisse</td>
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