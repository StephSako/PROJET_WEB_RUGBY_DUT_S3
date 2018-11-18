<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Supprimer Gouter</title>
		<link rel="stylesheet" href="../vues/style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
<body>

<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	
	<div class="cadreForm">
	<fieldset id="ConInscr">
		<legend class="titre_legend">Supprimer un Gouter</legend class="titre_legend">
		<?php include('../modeles/bd.php');		
			// On récupère tous les enfants
			$resultDelGouter = mysqli_query($co, 'SELECT gateau, boisson, idgouter FROM gouter NATURAL JOIN stockgouter ORDER BY gateau, boisson, idgouter') or die("Impossible d'exécuter la requête d'affichage des gouter.");
			?>
			<form method="POST" action="../controleurs/supprimerGouter.php">
			<?php echo "<select name ='selectdelgou' id='selectSuppG' size='".mysqli_num_rows($resultDelGouter)."'>";
				while($row = mysqli_fetch_array($resultDelGouter))
					echo "<option value='".$row['idgouter']."'>".$row['gateau'].' / '.$row['boisson'].'</OPTION>'; ?>
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