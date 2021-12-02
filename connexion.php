<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="styleconnexion.css">
</head>
<body>
	<form id="exo3" method="post" action="connexion.php" >
		<legend>Connexion</legend>
		<p>Saisissez vos informations...</p>
 <p>
 <label for="mail">Mail :</label><strong><abbr title="required">*</abbr></strong><br/>
 <input type="email" name="mail" id="mail"
 size="45" <?PHP if (isset ( $_POST['mail'])) { $mail = $_POST['mail' ]; echo "value
=\"$mail\""; } ?> />
</p>

<p>
<label for="mdp">Mot de passe : </label> <strong><abbr title="required">*</abbr></strong><br/>
<input type="password" name="mdp" id="mdp" size="45" />
 </p>
 <div>
<input type="submit" name="valider" id="valider" value="Se connecter"/></div>
</div>
<p>
<?php
if(!empty($_POST["valider"]))
{
	$ok= true;
	$mail = $_POST["mail"];
	$mdp = $_POST["mdp"];

 	if (empty($mail))
 	{
 		$ok = false;
 		echo "<p id=\"faux\">Entrez votre adresse éléctronique </p>";
 	}
 	if (empty($mdp))
 	{
 		$ok = false;
 		echo "<p>Entrez votre mot de passe </p>";
 	}
 	if($ok)
 	{
		 if(file_exists("inscription.csv")){
		$file =fopen("inscription.csv","r+") or die("pb fichier");
		while (! feof($file))
		{
			$ligne= trim(fgets($file));
			if ( strlen($ligne)!=0)
			{
				$user =explode (";",$ligne);
				$users[$user[0]]= $user[4];
			}
		}
		fclose($file);
		if (! array_key_exists($mail ,$users))
			echo "<p> Votre mail est incorrect.</p>";
		else if ( $users[$mail] != $mdp)
			echo "<p> Votre mdp est incorrect.</p>";
		else{
			echo "<p> Vous êtes bien connecté.<br><a href=\"index.html\">Retourner au menu</a></p>";
			$_SESSION["email"]=$mail;
		}}
		else{
			echo "<p> Votre mail est incorrect.</p>";
			echo "<p> Votre mdp est incorrect.</p>";
		}
 	}
}
?>
</p>

	</form>

</body>
</html>