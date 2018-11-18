<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Les Comptes Enfant</title>
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
			<form method="POST" action="afficheCompteEnfant.php">
			<?php echo "<select name ='selectenfant' size='".mysqli_num_rows($result)."'>";
				while($row = mysqli_fetch_array($result))
					echo '<option>'.$row['prenomenfant'].'</OPTION>'; ?>
				</select><br>
			<input type="submit" value="Afficher" id="bouton"><br>
			</form>
			<form method="POST" action="../vues/pageSupprimerEnfant.php">
			<?php include('../modeles/membre.php');
				if($_SESSION['statutAdmin'] == true)
					echo "<input type='submit' value='Supprimer' id='bouton'>";
				?>
			</form>

			<form method="post" action="pageModifierCompte.php">
			<input type="submit" value="Modifier un compte" id="bouton">
			</form>

			<form method="post" action="pageInscription.php">
			<input type="submit" value="Créer un compte" id="bouton">
			</form>
	</fieldset>
	

	<?php
		if(isset($_POST['selectenfant'])){	?>
		<br><br>
	<fieldset><!--AFFICHAGE DES INFORMATIONS DE L'ENFANT-->
				<legend class="titre_legend">Informations de l'enfant</legend class="titre_legend">

				<?php
					// On récupère l'enfant
					$resultInfo = mysqli_query($co, "SELECT IdEnfant, IdCompteEnfant, NomEnfant, PrenomEnfant, 
						SoldeInitial, NomCategorie, NomParent, Solde FROM categorie natural join enfant natural join voirsoldechaqueenfant natural join compteenfant natural join parent WHERE PrenomEnfant = '".$_POST['selectenfant']."'") or die("Impossible d'exécuter la requête de recherche.");

					echo "<table>
				    <tr>
						<th>ID</th>
						<th>ID Compte</th>
					    <th>Nom</th>
						<th>Prenom</th>
						<th>Catégorie</th>
						<th>Nom Parent</th>
						<th>Solde Initial</th>
						<th>Solde Actuel</th>
				    </tr>";
					
					// Afficher les résultats
					while ($row = mysqli_fetch_assoc($resultInfo)){
						echo "<tr>
							<td>".$row['IdEnfant']."</td>
							<td>".$row['IdCompteEnfant']."</td>
							<td>".$row['NomEnfant']."</td>
							<td>".$row['PrenomEnfant']."</td>
							<td>".$row['NomCategorie']."</td>
							<td>".$row['NomParent']."</td>
							<td>".$row['SoldeInitial']."</td>
							<td>".$row['Solde']."</td>
						</tr>";}
					echo "</table>";
				?>
			</fieldset>

			<br><br>
			<fieldset>
				<legend class="titre_legend">Toutes ses commandes</legend class="titre_legend">
					<?php
						$resultConso = mysqli_query($co, "SELECT idconso, dateconso, idgouter, quantitegouter, idprodsupp, quantiteprodsupp from consommation natural join enfant WHERE prenomenfant = '".$_POST['selectenfant']."' ORDER BY DateConso") or die("Impossible d'exécuter la requête de recherche.");

						echo "<table>
					    <tr>
							<th>ID</th>
							<th>Date Commande</th>
						    <th>ID Gouter</th>
							<th>Quantité Gouter</th>
							<th>ID Produit Supplémentaire</th>
							<th>Quantité Produit Supplémentaire</th>
					    </tr>";
						
						// Afficher les résultats
						while ($row = mysqli_fetch_assoc($resultConso)){
							echo "<tr>
								<td>".$row['idconso']."</td>
								<td>".$row['dateconso']."</td>
								<td>".$row['idgouter']."</td>
								<td>".$row['quantitegouter']."</td>
								<td>".$row['idprodsupp']."</td>
								<td>".$row['quantiteprodsupp']."</td>
							</tr>";}
						echo "</table></fieldset>";?> 
				<?php } ?> <div class="boutonB"><form method="post" action="accueil.php">
	<input type="submit" value="Retour à l'accueil" id="bouton">
	</form></div></div><!--fin du IF-->
</div>
</body>
</html>