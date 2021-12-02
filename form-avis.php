<?php
session_start();
if(! empty($_SESSION["email"])){
    $email=$_SESSION["email"];
}
else
    $email="Anonymous";
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <link rel="stylesheet" href="styleconnexion.css" />
</head>

<body>
    <div>
    <form id="avis" method="post" action="form-avis.php">
        <p>
            <label for="recette">Recette :</label>
            <select name="recette" id="recette">
            <option value=""><-------></option>
            <?PHP $recettes=file("recettes.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            natsort($recettes);
            foreach ( $recettes as $recette)
                { echo "<option value=\"$recette\" ";
                if (isset ( $_POST['recette']) && $_POST['recette' ]== "$recette" )
                    echo " selected " ;
                    echo " >$recette</option> ";
                }
            ?>
            </select>
        </p>
        <p>
            <p>Quelle note voulez vous donner ?</p>
            <?PHP
            for($i=0;$i<=5;$i=$i+1){
                echo "<div class=\"notes\">\n\t<input type=\"radio\" id=\"$i\" name=\"note\" value=\"$i\"";
                if(isset($_POST["note"]) && $_POST["note"]==$i)
                    echo " checked";
                echo ">\n<label for=\"$i\">$i</label>\n</div>";
            }
            ?>
        </p>
        <p>
            <label for="commentaire"> Commentaire supplémentaire (optionnel) :</label> <br />
            <textarea name="commentaire" id="commentaire" rows="5">
<?PHP if (isset ( $_POST['commentaire'])) { 
$commentaire = trim($_POST['commentaire']);
echo "$commentaire"; } ?>
</textarea>
        </p>
            <input type="submit" name="valider" id="valider" value="Envoyer"/>
    </form>
    <p>
        <?PHP
        if( !empty($_POST["valider"])){
            
$rempli=true;
if(! isset($_POST['recette']) || (isset ( $_POST['recette' ]) && $_POST['recette']=="")){
    echo "Veuillez renseigner une recette ! <br>";
    $rempli=false;}
if(! isset($_POST['note'])){
    echo "Veuillez renseigner une note !";
    $rempli=false;}
if($rempli){
$file = fopen("avis.csv", "a");
$tab[]=$_POST['recette'];
$tab[]=$_POST['note'];
$i=1;
if(! trim($_POST['commentaire'])==""){
    $tab[]=$_POST['commentaire'];
    $i=0;}
$tab[3]=$email;
foreach($tab as $val){
    fwrite($file, "$val");
    if($i<3){
        fwrite($file, ";");}
    $i=$i+1;}
fwrite($file,"\n");
fclose($file);
echo "Merci de votre avis $email !<br><a href=\"index.html\">Retourner au menu</a>";
    }
}
        ?>
    </p>
</div>
</body>

</html>