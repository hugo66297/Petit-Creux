<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="styleconnexion.css">
</head>
<body>
	<div>
	<form id="exo3" method="post" action="inscription.php" >
		<legend>Inscription</legend>
		<p>Parlez nous un peu de vous...</p>
		<p class="choix"> <label>Qui êtes vous ?</label>
 <input checked type="radio" name="sexe" value="H" id="homme" <?PHP if (isset ( $_POST['sexe' ]) && $_POST['sexe' ]=='H') echo "checked" ; ?>/>

<label for="homme">Homme</label>
<input type="radio" name="sexe" value="F" id="femme" />
<label for="femme">Femme</label>
</p>

<p>
 <label for="nom">Nom :</label> <strong><abbr title="required">*</abbr></strong>
 <input type="text" name="nom" id="nom" size="30"
 maxlength="20" <?PHP if (isset ( $_POST['nom' ])) { $mail = $_POST['nom' ]; echo "value
=\"$mail\""; } ?> />
 </p>
<p>
 <label for="prenom">Prénom :</label> <strong><abbr title="required">*</abbr></strong>
 <input type="text" name="prenom" id="prenom" size="30"
 maxlength="20" <?PHP if (isset ( $_POST['prenom' ])) { $prenom =
$_POST['prenom' ]; echo "value =\"$prenom\""; } ?> />
 </p>
 <p>
<label for="pays">Pays :</label><strong><abbr title="required">*</abbr></strong><br/>
<select name="pays" id="pays">
<option value="">-</option>

<?PHP $toutpays= array("Afghanistan","Afrique du Sud","Albanie","Algérie","Allemagne","Andorre","Angola","Antigua et Barbuda","Arabie saoudite","Argentine","Arménie","Australie","Autriche","Azerbaïdjan","Bahamas","Bahrein","Bangladesh","Barbade","Belgique","Bélize","Benin","Bhoutan","Biélorussie","Bolivie","Bosnie-Herzégovine","Botswana","Brésil","Brunei","Bulgarie","Burkina Faso","Burundi","Cambodge","Cameroun","Canada","Cap Vert","Centrafrique","Chili","Chine","Chypre","Colombie","Comores","Congo démocratique","Congo","Corée du Nord","Corée du Sud","Costa Rica","Côte d'Ivoire","Croatie","Cuba","Danemark","Djibouti","Dominique","RépubliqueDominicaine","Egypte","Emirats Arabes Unis","Equateur","Erythrée","Espagne","Estonie","Etats-Unis","Ethiopie","Fidji","Finlande","France","Gabon","Gambie","Géorgie","Ghana","Grèce","Grenade","Groenland","Guatémala","Guinée","Guinée Bissau","Guinée équatoriale","Guyana","Haïti","Honduras","Hong Kong","Hongrie","Inde","Indonésie","Irak","Iran","Irlande","Islande","Israël","Italie","Jamaïque","Japon","Jordanie","Kazakhstan","Kenya","Kirghizstan","Kiribati","Koweït","Laos","Lesotho","Lettonie","Liban","Liberia","Libye","Liechtenstein","Lituanie","Luxembourg","Macédoine","Madagascar","Malaisie","Malawi","Maldives","Mali","Malte","Maroc","Marshall","Maurice","Mauritanie","Mexique","Micronésie","Moldavie","Monaco","Mongolie","Mozambique","Myanmar","Namibie","Népal","Nicaragua","Niger","Nigeria","Norvège","Nouvelle Zélande","Oman","Ouganda","Ouzbekistan","Pakistan","Palau","Palestine","Panama","Papouasie - Nouvelle Guinée","Paraguay","Pays-Bas","Pérou","Philippines","Pologne","Porto Rico","Portugal","Qatar","Roumanie","Royaume-Uni","Russie","Rwanda","Saint Christophe et Nevis","Saint Vincent et les Grenadines","Sainte Lucie","Salomon","Salvador","Samoa","São Tomé et Príncipe","Sénégal","Seychelles","Sierra Leone","Singapour","Slovaquie","Slovénie","Somalie","Somaliland","Soudan","Sri Lanka","Suède","Suisse","Surinam","Syrie","Swaziland","Tadjikistan","Taïwan","Tanzanie","Tchad","Tchéquie","Thaïlande","Tibet","Timor Oriental","Togo","Tonga","Trinité et Tobago","Tunisie","Turkmenistan","Turquie","Tuvalu","Ukraine","Uruguay","Vanuatu","Vatican","Vénézuéla","Vietnam","Yémen","Yougoslavie","Zambie","Zimbabwe");
foreach ( $toutpays as $pays)
{echo "<option value=\"$pays\" ";
 if (isset ( $_POST['pays' ]) && $_POST['pays' ]== "$pays" )
 echo " selected " ;
 echo " >$pays</option> ";
}

?>
</select>
</p>
 <p>
 <label for="mail">Mail :</label><strong><abbr title="required">*</abbr></strong><br/>
 <input type="email" name="mail" id="mail"
 size="30" <?PHP if (isset ( $_POST['mail'])) { $mail = $_POST['mail' ]; echo "value
=\"$mail\""; } ?> />
</p>
<p>
<label for="mdp">Mot de passe : </label> <strong><abbr title="required">*</abbr></strong><br/>
Au moins huit caractères dont au moins un chiffre et un caractère de ponctuation <br/>
<input type="password" name="mdp" id="mdp" size="60" />
 </p>

 <p>
<label for="mdpbis">Confirmation mot de passe :</label><br/>
<input type="password" name="mdpbis" id="mdpbis" size="60" />
 </p>
<input type="submit" name="valider" id="valider" value="S'inscrire"/>

</form>
<?php
if(!empty($_POST["valider"]))
{
	$ok= true;
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$mail = $_POST["mail"];
	$pays = $_POST["pays"];
	$mdp = $_POST["mdp"];
	$mdpbis = $_POST["mdpbis"];

	if (empty($nom))
 	{
 		$ok = false;
 		echo "<p id=\"faux\">Le nom doit être renseigné </p>";
 	}
 	if (empty($prenom))
 	{
 		$ok = false;
 		echo "<p id=\"faux\">Le prenom doit être renseigné </p>";
 	}
 	if (empty($pays))
 	{
 		$ok = false;
 		echo "<p id=\"faux\">Le pays doit être renseigné </p>";
 	}
 	if (empty($mail))
 	{
 		$ok = false;
 		echo "<p id=\"faux\">Le mail doit être renseigné </p>";
 	}
 	if (empty($mdp))
 	{
 		$ok = false;
 		echo "<p>Le mot de passe doit être renseigné</p>";
 	}
 	else if (!( preg_match("/[[:alpha:]]/",($mdp)) && preg_match("/[[:punct:]]/",($mdp)) && preg_match("/[[:digit:]]/",($mdp)) && strlen(($mdp))>=8 ))
	{
 		echo "<p id=\"faux\">Votre mot de passe doit contenir au moins une lettre,un chiffre et un symbole de ponctuation et doit etre long de huit caractere</p>";
 		$ok=false;
	}
	if (empty($mdpbis))
{
 		echo "<p id=\"faux\">Le mot de passe doit être vérifier </p>";
 		$ok=false;
}
 	else if (($mdp)!=($mdpbis))
	{
		echo "<p id=\"faux\">le mot de passe ne peux etre verifier </p>";
		$ok=false;
	}

 	if($ok)
 	{
 		$file=fopen("inscription.csv","a");
 		if (! $file)
        	die ( "pb avec le fichier inscription.csv");
     	fwrite ($file,"$mail;$nom;$prenom;$pays;$mdp\n");
     	fclose($file);
		echo "<p>Votre compte a ete créé<br><a href=\"connexion.php\">Se connecter</a></p>";
 	}

}
?>
</div>

</body>
</html>