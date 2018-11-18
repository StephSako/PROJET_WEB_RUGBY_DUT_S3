<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Modifier Gouter</title>
		<link rel="stylesheet" href="../vues/style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
<body>

<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	
	<div class="cadreForm">
	<fieldset id="ConInscr">
		<legend class="titre_legend">Selectionner un Gouter à modifier</legend class="titre_legend">
		<?php include('../modeles/bd.php');
			$resultModifG = mysqli_query($co, 'SELECT gateau, boisson, idgouter FROM gouter NATURAL JOIN stockgouter ORDER BY idgouter') or die("Impossible d'exécuter la requête d'affichage des gouter.");
			?>
			<form method="POST" action="#">
			<?php echo "<select name ='selectModifG' size='".mysqli_num_rows($resultModifG)."'>";
				while($row = mysqli_fetch_array($resultModifG))
					echo "<option value='".$row['idgouter']."'>".$row['gateau'].' / '.$row['boisson'].'</OPTION>'; ?>
				</select><br>
			<input type="submit" value="Modifier Gouter" id="bouton">
			</form>
	</fieldset>
	
	<?php
		if(isset($_POST['selectModifG'])){ ?>
		<fieldset>
			<form method="POST" action="../controleurs/modifierGouter.php">
			<legend class="titre_legend">Informations modifiables</legend class="titre_legend">
			<?php include('../modeles/bd.php'); session_start();

					$resultG = mysqli_query($co, "SELECT gateau, boisson, quantitegouter, prixgouter FROM gouter NATURAL JOIN stockgouter WHERE idgouter =
					'".$_POST['selectModifG']."'") or die("Impossible d'exécuter la requête.");
					$tableau = mysqli_fetch_array($resultG);
					$gateau = $tableau['gateau'];
					$boisson = $tableau['boisson'];
					$prixgouter = $tableau['prixgouter'];
					$qtégouter = $tableau['quantitegouter'];
					$_SESSION['idGModif'] = $_POST['selectModifG'];?>

					<p>Nouveau gateau</p><input type='text' name='gateauModif' class='champ'
						value=<?php echo $gateau; ?> ></input><br>
					<p>Nouvelle boisson</p><input type='text' name='boissonModif' class='champ'
						value=<?php echo $boisson; ?> ></input><br>
					<p>Nouveau prix du gouter</p><input type='text' name='prixGModif' class='champ'
						value=<?php echo $prixgouter; ?> ></input><br>
					<p>Nouvelle quantité du gouter</p><input type='text' name='qtéGModif' class='champ'
						value=<?php echo $qtégouter; ?> ></input><br>

					<br><input type="submit" value="Modifier" id="bouton">
					</form>
				</fieldset>
	<?php } ?>

	<div class="boutonB">
	<form method="post" action="afficheStocks.php">
	<br><input type="submit" value="Retour Stocks" id="bouton">
	</form></div>

</body>
</html>