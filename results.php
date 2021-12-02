<?PHP
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
foreach($tab as $val){
    fwrite($file, "$val");
    if($i<2){
        fwrite($file, ";");}
    $i=$i+1;}
fwrite($file,"\n");
fclose($file);

//Code pour calculer les moyennes

$fichier=file("avis.csv", FILE_IGNORE_NEW_LINES);
$ligne=array();
foreach($fichier as $f){
    $ligne[]=explode(";",$f);
}

$recette="Poulet coco"; //A recuperer selon la page sur laquelle on est
$moy=0;
$nbtot=0;
foreach($ligne as $valeur){
    if(in_array($recette,$valeur)){
        $moy=$moy+$valeur[1];
        $nbtot=$nbtot+1;}}
if($nbtot==0)
        $moy=0;
else
    $moy=round($moy/$nbtot,1);
echo "Moyenne du poulet coco : $moy/5<br>";

$recette="Sirop de grenadine"; //A recuperer selon la page sur laquelle on est
$moy=0;
$nbtot=0;
foreach($ligne as $valeur){
    if(in_array($recette,$valeur)){
        $moy=$moy+$valeur[1];
        $nbtot=$nbtot+1;}}
if($nbtot==0)
    $moy=0;
else
    $moy=round($moy/$nbtot,1);
echo "Moyenne du sirop de grenadine : $moy/5<br>";

$recette="Eau tiède"; //A recuperer selon la page sur laquelle on est
$moy=0;
$nbtot=0;
foreach($ligne as $valeur){
    if(in_array($recette,$valeur)){
        $moy=$moy+$valeur[1];
        $nbtot=$nbtot+1;}}
if($nbtot==0)
    $moy=0;
else
    $moy=round($moy/$nbtot,1);
echo "Moyenne de l'eau tiède : $moy/5<br>";
}
?>