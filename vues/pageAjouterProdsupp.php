<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Ajouter un Produit Supplémentaire</title>
		<link rel="stylesheet" href="./style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
	<body>
	
	<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
			
	<div class="cadreForm">
	<fieldset id="ConInscr">
				<legend class="titre_legend">Ajouter un Produit Supplémentaire</legend class="titre_legend">
				<form method="POST" action="../controleurs/ajouterProdsupp.php">		
				<p>Nom du produit</p><input type="text" name="newnomPS" class="champ"></input>
				<p>Prix</p><input type="number" name="newprixPS" value="1" min="0" max="4" class="champ"></input>
				<p>Quantite</p><input type="number" value="0" min="20" max="100" name="newquantitePS" class="champ"></input>
				<br><input type="submit" value="Ajouter" id="bouton">
				</form>
			</fieldset>

			<div class="boutonB">
			<form method="post" action="../vues/afficheStocks.php">
			<input type="submit" value="Retour Stocks" id="bouton">
			</form>		</div>
</div>			
	</body>
</html>