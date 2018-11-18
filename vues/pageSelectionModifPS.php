<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Modifier Produit Supplémentaire</title>
		<link rel="stylesheet" href="../vues/style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
<body>

<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	
	<div class="cadreForm">
	<fieldset id="ConInscr">
		<legend class="titre_legend">Produit à modifier</legend class="titre_legend">
		<?php include('../modeles/bd.php');
			$resultModifPS = mysqli_query($co, 'SELECT nomprodsupp, idprodsupp FROM produitsupplementaire NATURAL JOIN stockprodsupp ORDER BY idprodsupp') or die("Impossible d'exécuter la requête d'affichage des produits supplementaire.");
			?>
			<form method="POST" action="#">
			<?php echo "<select name ='selectModifPS' size='".mysqli_num_rows($resultModifPS)."'>";
				while($row = mysqli_fetch_array($resultModifPS))
					echo "<option value='".$row['idprodsupp']."'>".$row['nomprodsupp'].'</OPTION>'; ?>
				</select><br>
			<input type="submit" value="Modifier Produit" id="bouton">
			</form>
	</fieldset>
	
	<?php
		if(isset($_POST['selectModifPS'])){ ?>
		<form method="POST" action="../controleurs/modifierProdsupp.php">
		<fieldset>
			<legend class="titre_legend">Informations modifiables</legend class="titre_legend">
			<?php include('../modeles/bd.php');

					$resultPS = mysqli_query($co, "SELECT nomprodsupp, prixprodsupp, quantiteprodsuppstock FROM produitsupplementaire NATURAL JOIN stockprodsupp WHERE idprodsupp =
					'".$_POST['selectModifPS']."'") or die("Impossible d'exécuter la requête.");
					$tableau = mysqli_fetch_array($resultPS);
					$nomproduit = $tableau['nomprodsupp'];
					$prixproduit = $tableau['prixprodsupp'];
					$qtéproduit = $tableau['quantiteprodsuppstock']; ?>

					<p>Nouveau nom du produit</p><input type='text' name='nomPSModif' class='champ'
						value=<?php echo $nomproduit; ?> ></input><br>
					<p>Nouveau prix du produit</p><input type='text' name='prixPSModif' class='champ'
						value=<?php echo $prixproduit; ?> ></input><br>
					<p>Nouvelle quantité du produit</p><input type='text' name='qtéPSModif' class='champ'
						value=<?php echo $qtéproduit; ?> ></input><br>

					<br><input type="submit" value="Modifier" id="bouton">
					</form>
				</fieldset>
	<?php } ?>

	<div class="boutonB">
	<form method="post" action="afficheStocks.php">
	<br><input type="submit" value="Retour Stocks" id="bouton">
	</form></div>
</div>
</body>
</html>