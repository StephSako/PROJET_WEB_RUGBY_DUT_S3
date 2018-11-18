<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Supprimer Produit Supplémentaire</title>
		<link rel="stylesheet" href="../vues/style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
<body>

<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	
	<div class="cadreForm">
	<fieldset id="ConInscr">
		<legend class="titre_legend">Supprimer Produit</legend class="titre_legend">
		<?php include('../modeles/bd.php');
			$resultDelProdsupp = mysqli_query($co, 'SELECT nomprodsupp, idprodsupp FROM produitsupplementaire NATURAL JOIN stockprodsupp ORDER BY idprodsupp') or die("Impossible d'exécuter la requête d'affichage des gouter.");
			?>
			<form method="POST" action="../controleurs/supprimerProdsupp.php">
			<?php echo "<select name ='selectdelprodsupp' size='".mysqli_num_rows($resultDelProdsupp)."'>";
				while($row = mysqli_fetch_array($resultDelProdsupp))
					echo "<option value='".$row['idprodsupp']."'>".$row['nomprodsupp'].'</OPTION>'; ?>
				</select><br>
			<input type="submit" value="Supprimer" id="bouton">
			</form>

	</fieldset>
<div class="boutonB">
	<form method="post" action="afficheStocks.php">
	<input type="submit" value="Retour Stocks" id="bouton">
	</form></div>
</div>
</body>
</html>