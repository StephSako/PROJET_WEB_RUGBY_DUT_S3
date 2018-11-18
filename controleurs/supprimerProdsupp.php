<?php
	include('../modeles/bd.php');

	if(!empty($_POST['selectdelprodsupp'])){
		header('Location:../vues/afficheStocks.php');

		//suppression du stock du produit supplémentaire
		$resultSuppProdSupp = mysqli_query($co, "DELETE FROM stockprodsupp WHERE idstockprodsupp = '".$_POST['selectdelprodsupp']."'") or die("Impossible d'exécuter la requête.");

		//suppression du produit supplémentaire
		$resultSuppProdSupp = mysqli_query($co, "DELETE FROM produitsupplementaire WHERE idprodsupp = '".$_POST['selectdelprodsupp']."'") or die("Impossible d'exécuter la requête.");
	}else header('Location:../vues/pageSupprimerProdsupp.php');
?>