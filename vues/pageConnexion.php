<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Connexion</title>
		<link rel="stylesheet" href="./style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
	
	
	<body>
		
		<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	

		<div class="cadreForm">
			<fieldset id="ConInscr">
				<legend class="titre_legend">Se Connecter</legend class="titre_legend">
				<form method="POST" action="../controleurs/connexion.php">		
					<p>Login</p><input type="text" name="login" class="champ">
					<p>Mot de Passe</p><input type="text" name="mdpasse" class="champ">
					<br><br>
					<input type="submit" value="Se connecter" id="bouton">
					<br>
				</form>
				<form method="post" action="accueilConInscr.php">
				<input type="submit" value="Retour à l'accueil" id="bouton">
				</form>
			</fieldset>
		</div>
	</body>
</html>