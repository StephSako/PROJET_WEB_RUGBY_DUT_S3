<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Supprimer Enfant</title>
		<link rel="stylesheet" href="./style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
<body>

<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
	
	<div class="cadreForm">
	<fieldset id="ConInscr"> <!--AFFICHAGE DE TOUS LES ENFANTS PAR LEUR PRENOM-->
		<legend class="titre_legend">Comptes des Enfants</legend class="titre_legend">
		<?php include('../modeles/bd.php');		
			// On récupère tous les enfants
			$result = mysqli_query($co, 'SELECT prenomenfant, idenfant FROM Enfant ORDER BY idenfant') or die("Impossible d'exécuter la requête d'affichage des enfants.");
			?>
			<form method="POST" action="../controleurs/supprimerEnfant.php">
			<?php echo "<select name ='selectenfant' size='".mysqli_num_rows($result)."'>";
				while($row = mysqli_fetch_array($result))
					echo '<option>'.$row['prenomenfant'].'</OPTION>'; ?>
				</select><br>
			<input type='submit' value='Supprimer' id='bouton'>
			</form>
			
			<form method="post" action="afficheCompteEnfant.php">
			<input type="submit" value="Retour aux comptes" id="bouton">
			</form>
	</fieldset>
	</div>
	<?php echo "</div>"; ?> <!--fin du IF-->

	
</div>
</body>
</html>