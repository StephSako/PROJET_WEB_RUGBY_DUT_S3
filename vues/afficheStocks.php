<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Les Stocks</title>
		<link rel="stylesheet" href="../vues/style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
<body>

<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	
	<div class="cadreForm">
	<fieldset id="ConInscr">
		<legend class="titre_legend">Stock des Gouters</legend class="titre_legend">
		<?php include '../modeles/bd.php';
			
			// On récupère tous les gouters
			$result = mysqli_query($co, 'SELECT * FROM StockGouter NATURAL JOIN Gouter ORDER BY IDgouter') or die("Impossible d'exécuter la requête.");
			
			echo "<table>
			    <tr>
					<th>ID Gouter</th>
					<th>Quantité</th>
					<th>Prix</th>
					<th>Gateau</th>
				    <th>Boisson</th>
			    </tr>";
				
				// Afficher les résultats
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>
							<td>".$row['IdGouter']."</td>
							<td>".$row['QuantiteGouter']."</td>
							<td>".$row['PrixGouter']."</td>
							<td>".$row['Gateau']."</td>
							<td>".$row['Boisson']."</td>
						</tr>";}
				echo "</table>";	
		?>
		
		<table id="test">
		<td>	
	<form method="post" action="pageAjouterGouter.php">
		<input type="submit" value="Ajouter" id="bouton">
		</form></td>
		<td>
		<form method="post" action="pageSupprimerGouter.php">
		<input type="submit" value="Supprimer" id="bouton">
		</form></td>
		<td>
		<form method="post" action="pageSelectionModifG.php">
		<input type="submit" value="Modifier" id="bouton">
		</form>
			</td>
			</table>
	</fieldset>
	<br>
	<fieldset>
		<legend class="titre_legend">Produits Supplémentaires</legend class="titre_legend">
		<?php include '../modeles/bd.php';
			
			// On récupère tous les produits supplémentaires
			$result = mysqli_query($co, 'SELECT * FROM StockProdSupp NATURAL JOIN ProduitSupplementaire ORDER BY IDprodsupp') or die("Impossible d'exécuter la requête.");
			
			echo "<table>
			    <tr>
					<th>ID Produit Supplémentaire</th>
					<th>Quantité</th>
					<th>Prix</th>
					<th>Nom Produit</th>
			    </tr>";
				
				// Afficher les résultats
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>
							<td>".$row['IdProdSupp']."</td>
							<td>".$row['QuantiteProdSuppStock']."</td>
							<td>".$row['PrixProdSupp']."</td>
							<td>".$row['NomProdSupp']."</td>
						</tr>";}
				echo "</table>";
				mysqli_close($co); //fermeture de la connexion				
		?>
		
		<table id="test">
		<td>
		<form method="post" action="pageAjouterProdsupp.php">
		<input type="submit" value="Ajouter" id="bouton">
		</form></td>
		<td>
		<form method="post" action="pageSupprimerProdsupp.php">
		<input type="submit" value="Supprimer" id="bouton">
		</form></td>
		<td>
		<form method="post" action="pageSelectionModifPS.php">
		<input type="submit" value="Modifier" id="bouton">
		</form>
		</td>	
		</table>
	</fieldset>

	<div class="boutonB"><form method="post" action="accueil.php">
	<input type="submit" value="Retour à l'accueil" id="bouton">
	</form></div>
</div>
</body>
</html>