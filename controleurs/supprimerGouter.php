<?php
	include('../modeles/bd.php');

	if(!empty($_POST['selectdelgou'])){
		header('Location:../vues/afficheStocks.php');

		//suppression du stock du gouter
		$resultSuppGouter = mysqli_query($co, "DELETE FROM stockgouter WHERE idstockgouter = '".$_POST['selectdelgou']."'") or die("Impossible d'exécuter la requête.");

		//suppression du gouter
		$resultSuppGouter = mysqli_query($co, "DELETE FROM gouter WHERE idgouter = '".$_POST['selectdelgou']."'") or die("Impossible d'exécuter la requête.");
	}else header('Location:../vues/pageSupprimerGouter.php');
?>