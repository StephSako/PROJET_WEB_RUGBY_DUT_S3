<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Commander</title>
		<link rel="stylesheet" href="./style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>

<body>

<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	
	<div class="cadreForm">
	<fieldset id="ConInscr">
		<legend class="titre_legend">Comptes des Enfants</legend class="titre_legend">
		<?php include('../modeles/bd.php');	
			// On récupère tous les enfants
			$resultEnfant = mysqli_query($co, 'SELECT prenomenfant, idenfant FROM Enfant ORDER BY prenomenfant') or die("Impossible d'exécuter la requête d'enfant.");
			?>

			<form method="POST" action="../controleurs/commande.php">
				<?php echo "<select name ='selectenfant' size='".mysqli_num_rows($resultEnfant)."'>";
					while($row = mysqli_fetch_array($resultEnfant))
						echo '<option>'.$row['prenomenfant']; ?>
					</select>
		</fieldset>
	<fieldset>
		<legend class="titre_legend">Commande de Gouters</legend class="titre_legend">
		<?php
			// On récupère tous les gouter
			$resultGouter = mysqli_query($co, 'SELECT DISTINCT gateau FROM Gouter ORDER BY gateau') or die("Impossible d'exécuter la requête de gouter.");
			$resultBoisson = mysqli_query($co, 'SELECT DISTINCT boisson FROM Gouter ORDER BY boisson') or die("Impossible d'exécuter la requête de gouter.");
			
				echo "<select name ='gateauselect' size='".mysqli_num_rows($resultGouter)."'>";
					while($row = mysqli_fetch_array($resultGouter))
						echo '<option>'.$row['gateau'];
					echo "</select>
					<br><br>";

					echo "<select name ='boissonselect' size='".mysqli_num_rows($resultBoisson)."'>";
					while($row = mysqli_fetch_array($resultBoisson))
						echo '<option>'.$row['boisson']; ?>
					</select>
					<br>
				<p>Quantité :<input type="number" value="0" min="0" max="5" name="qtégouter"></p>
	</fieldset>
	<fieldset>
		<legend class="titre_legend">Produits Supplémentaires</legend class="titre_legend">
		<?php
			// On récupère tous les produits supplémentaires
			$resultProdSupp = mysqli_query($co, 'SELECT nomprodsupp FROM produitsupplementaire ORDER BY nomprodsupp') or die("Impossible d'exécuter la requête de prod supp.");
		?>
		<?php echo "<select name ='prodsuppselect' size='".mysqli_num_rows($resultProdSupp)."'>";
			while($row = mysqli_fetch_array($resultProdSupp))
				echo '<option>'.$row['nomprodsupp']; ?>
			</select>
			<br>
			<p>Quantité : <input type="number" value="0" min="0" max="5" name="qtéprodsupp"></p><input type="submit" value="Commander" id="bouton">
	</fieldset>


	
	</form>
	<br>
	<form method="post" action="accueil.php">
	<div class="boutonB">
	<input type="submit" value="Retour à l'accueil" id="bouton">
	</form></div>
	</div>
</body>
</html>