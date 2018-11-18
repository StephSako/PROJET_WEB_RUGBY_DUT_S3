<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Menu APERO</title>
		<link rel="stylesheet" href="./styleAcc.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
<body>
	<?php include('../modeles/membre.php'); ?>
	
<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	

	 <!--  <h1 id="Titre">APERO</h1> -->

	<div class="accueilConIscr">

	<form method="POST" action="../vues/pageCommande.php">
	<input type="submit" value="Commander" id="bouton">
	</form>


	<form method="POST" action="../vues/afficheCompteEnfant.php">
	<input type="submit" value="Comptes Enfant" id="bouton">
	</form>

	<form method="POST" action="../vues/afficheStocks.php">
	<input type="submit" value="Stocks" id="bouton">
	</form>

	<form method="POST" action="../controleurs/deconnexion.php">
	<input type="submit" value="Se Déconnecter" id="bouton">
	</form>

	<form method="POST" action="../vues/viderBD.php">
	<input type="submit" value="Vider la Base de Données" id="bouton">
	</form>

	</div>
</body>
</html>