<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
	<head>
		<title>Inscription</title>
		<link rel="stylesheet" href="./style.css " type="text/css"/>
		<meta charset="UTF-8">
	</head>
	<body>
	<div class="banniere"><img src ="logopro.png" alt="logo de l'assoc"/></div>	
			
			
			
			<div class="cadreForm">
			<fieldset id="ConInscr">
				<legend class="titre_legend">S'inscrire</legend class="titre_legend">
				<form method="POST" action="../controleurs/inscription.php">		
					<p>Login<br><input type="text" name="login" class="champ"></input></p>
					<p>Mot de Passe<br><input type="text" name="mdpasse" class="champ"></input></p>
					<p>Nom<br><input type="text" name="nom" class="champ"></input></p>
					<p>Moyen de paiement : 
					<br><INPUT type="checkbox" name="CarteBancaire" value="1">Carte Bancaire
					<br><INPUT type="checkbox" name="Espece" value="1">Espèce</p>
					<div id='infoenfant'>
						<p>Prénom de l'enfant<br><input type="text" name="pEnfant" class="champ"></input></p>
						<p>Nom de l'enfant<br><input type="text" name="nEnfant" class="champ"></input></p>
						<p>Catégorie : <br><?php include('../modeles/bd.php');
							$result = mysqli_query($co, 'SELECT ageminimum, agemaximum, nomcategorie FROM categorie ORDER BY idcategorie') or die("Impossible d'exécuter la requête d'affichage des enfants.");
							echo "<select name ='selectcategorie' >";
							while($row = mysqli_fetch_array($result))
							echo '<option>'.$row['nomcategorie'].' ('.$row['ageminimum'].'-'.$row['agemaximum'].' ans)</OPTION>'; ?>
							</select></p>
						<p>Solde initial : <input type="number" name="soldeinitial" min="10" max="200"></p>
					<input type="submit" value="Créer un compte" id="bouton">
				</form>
				<form method="post" action=<?php session_start();
					if(isset($_SESSION['login'])) echo "accueil.php"; 
					else echo "accueilConInscr.php";
				?> >
					<input type="submit" value="Retour à l'accueil" id="bouton">
				</form>
			</fieldset>
		</div>
		</div>
</body>
</html>