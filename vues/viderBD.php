<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Vider la Base de Données</title>
		<link rel="stylesheet" href="../vues/style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
<body>
<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	
	<div class="cadreForm">
	<fieldset id="ConInscr">
		<legend class="titre_legend">Vider la base de données</legend class="titre_legend">
			<?php
				include('../modeles/membre.php');
				include('../vues/scripts.php');

				if($_SESSION['statutAdmin'] == true){
					echo "<input type='submit' onclick='redirectViderBDConso()' value='Vider commandes' id='bouton'><br>";
					echo "<input type='submit' onclick='redirectViderBDComptes()' value='Vider comptes' id='bouton'>";
				}
				else{
					echo "Vous n'êtes pas Administrateur.";
				}
			?>
		<form method="post" action="accueil.php">
		<input type="submit" value="Retour à l'accueil" id="bouton">
		</form>
	</fieldset><br>	
	</div>
	
</body>
</html>