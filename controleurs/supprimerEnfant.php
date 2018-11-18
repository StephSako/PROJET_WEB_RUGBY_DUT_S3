<?php include('../modeles/bd.php');

	if(!empty($_POST['selectenfant'])){
		header('Location:../vues/afficheCompteEnfant.php');

		$result = mysqli_query($co, "SELECT idparent, idenfant FROM enfant NATURAL JOIN COMPTEENFANT NATURAL JOIN PARENT WHERE prenomenfant = '".$_POST['selectenfant']."'") or die("Impossible d'exécuter la requête d'affichage des enfants.");
		$tableau = mysqli_fetch_array($result);
		$idenfant = $tableau['idenfant'];
		$idparent = $tableau['idparent'];

		$result = mysqli_query($co, "DELETE FROM compteenfant WHERE idenfant = '".$idenfant."'") or die("Impossible d'exécuter la requête d'affichage des enfants.");
		$result = mysqli_query($co, "DELETE FROM parent WHERE idparent = '".$idparent."'") or die("Impossible d'exécuter la requête d'affichage des enfants.");
		$result = mysqli_query($co, "DELETE FROM enfant WHERE idenfant = '".$idenfant."'") or die("Impossible d'exécuter la requête d'affichage des enfants.");

	}else header('Location:../vues/pageSupprimerEnfant.php');

?>