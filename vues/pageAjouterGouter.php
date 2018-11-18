<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Ajouter un Gouter</title>
		<link rel="stylesheet" href="./style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
	<body>
	
	<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
			
	<div class="cadreForm">
	<fieldset id="ConInscr">
				<legend class="titre_legend">Ajouter un Gouter</legend class="titre_legend">
				<form method="POST" action="../controleurs/ajouterGouter.php">		
				<p>Nom du gateau</p><input type="text" name="newnomGateau" class="champ"></input>
				<p>Nom de la boisson</p><input type="text" name="newnomBoisson" class="champ"></input>
				<p>Prix</p><input type="number" name="newprixG" value="1" min="0" max="4" class="champ"></input>
				<p>Quantite</p><input type="number" value="0" min="20" max="100" name="newquantiteG" class="champ"></input>
				<br><input type="submit" value="Ajouter" id="bouton">
				</form>
			</fieldset>
	<div class="boutonB">
			<form method="post" action="../vues/afficheStocks.php">
			<input type="submit" value="Retour Stocks" id="bouton">
			</form>	</div>
</div>			
	</body>
</html>