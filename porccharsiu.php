<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Petit Creux</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel="icon" type="image/png" href="img\logopetitcreux.png" />
    <style> 

  header {
  background-image: url("img\\porccharsiu.jpg");
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
          <h2><?php $recette="Porc char siu";
                echo "$recette";?></h2></div>
  <table class="tab">
  <tr>
          <td class="maintab">Temps préparation: 1H40min</td>
          <td class="maintab"><form action="porccharsiu.php#titre" method="post"><input class="boutonperso" type="submit" value=" - " name="moins">Recette pour <?php 
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
              <td class="etape">- <?php $qtt=round(400/$DEFAUT_PERS*$personne,2);
              echo "$qtt";?>g filet mignon de porc</td>
              <td class="imgingre"><img id="aliment" src="img\filetmignon.jpg" alt="filetmignon" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillères d'Hoisin sauce</td>
              <td class="imgingre"><img id="aliment" src="img\saucehoisin.png" alt="hoisin" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(2/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillères sauce Char Siu</td>
              <td class="imgingre"><img id="aliment" src="img\soja.jpg" alt="saucechar" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> morceau de furu blanc</td>
              <td class="imgingre"><img id="aliment" src="img\furublanc.png" alt="furublanc" /></td>
              <td class="titreingre"></td>
            </tr>
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillère de sauce de soja claire </td>
              <td class="imgingre"><img id="aliment" src="img\saucesoja.jpg" alt="soja" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillère de sucre</td>
              <td class="imgingre"><img id="aliment" src="img\sucre.jpg" alt="sucre" /></td>
              <td class="titreingre"></td>
            </tr> 
            <tr>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> cuillère d'huile de tournesol</td>
              <td class="imgingre"><img id="aliment" src="img\huiletournesol.jpg" alt="huiletournesol" /></td>
              <td class="titreingre"></td>
              <td class="etape">- <?php $qtt=round(1/$DEFAUT_PERS*$personne);
              echo "$qtt";?> pincée poivre</td>
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
          <td>La préparation du Char siu commence par la réalisation de la marinade. Mélangez la sauce Hoisin à la sauce Char Siu</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Avec le morceau de furu blanc, , puis la sauce de soja claire, le sucre et l'huile de tournesol.</td>
          <td class="numdroite">2</td>
        </tr>
        <tr>
          <td class="numgauche">3</td>
          <td>Prenez un plat allant au four et mettez y le filet mignon de porc. Enrobez bien la viande de votre marinade à Char siu, poivrez et réservez-en une petite quantité. Couvrez votre viande et mettez le plat au réfrigérateur. Votre Char siu doit mariner au minimum 4 heures, mais si vous préparez la Char siu la veille, c'est encore mieux !</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Après avoir bien mariné, préchauffez votre four à 200 °c, mettez dans un plat allant au four de l'eau chaude que vous enfournez pendant 15 minutes,cela permettra à votre viande de ne pas sécher à la cuisson.Ensuite sortez votre Char siu, et mettez-le à égoutter sur une grille.</td>
          <td class="numdroite">4</td>
        </tr>
        <tr>
          <td class="numgauche">5</td>
          <td>Enfournez votre Char siu pendant 20 minutes en mode chaleur tournante, puis arrosez le de la sauce que vous avez réservée de la veille. Remettez ensuite le Char siu durant 10 minutes au four en fonction grill si votre four le permet.Vous pouvez l'accompagner de riz ou de légumes sautés au wok !</td>
          <td></td>
          <td></td>
        </tr>

      </table>
      <p id="source">Source : CuisineAZ</p>
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