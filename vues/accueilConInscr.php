<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Accueil</title>
		<link rel="stylesheet" href="./styleAcc.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
<body>

<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	

	<h1 id="Titre">Bienvenue sur l'application APERO !</h1>
	<br><br>
	<div class="accueilConIscr">
	<form method="POST" action="../vues/pageConnexion.php">		
		<br>
		<input type="submit" value="Se connecter" id="bouton">
	</form>
	
	<form method="POST" action="../vues/pageInscription.php">
	<input type="submit" value="S'inscrire" id="bouton">
	<br>
	</form>
	</div>

	
	<div class="footer">
  <p>Contacts: <a href="mailto:aperorsay@gmail.com">aperorsay@gmail.com</a>.<br>
  tel : 01 50 99 11 22</p>
</div>
	
</body>
</html>